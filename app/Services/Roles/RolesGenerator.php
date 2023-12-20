<?php

namespace App\Services\Roles;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class RolesGenerator
{
    /**
     *  Define basic operation to be used for each model permissions.
     */
    const BASIC_ROLE = 'super-admin';

    /**
     *  Define basic resource methods.
     */
    const BASIC_METHODS = [
        'index' => 'view',
        'store' => 'create',
        'create' => 'create',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'edit',
        'destroy' => 'delete'
    ];

    /**
     *  Define custom permissions.
     */
    const CUSTOM_PERMISSIONS = [
        'setting' => [
            'view_setting', 'create_setting', 'services', 'levels', 'home_settings', 'communication_settings',
            'about_page_settings', 'principles_section_settings', 'member_page_settings', 'translations'
        ]
    ];

    /**
     *  Define ignored models.
     */
    const EXCEPTION_CONTROLLERS = [];

    /**
     *  Define controllers that handles multi-modules .
     */
    const CONTROLLERS_WITH_MULTI_MODULES = [];

    /**
     *  Store auto generated permissions in db.
     *
     * @param array $paths
     * @return void
     */
    public static function GenerateAndStorePermissions($paths = []): void
    {
        $permissions = [];
        if (count($paths)) {
            foreach ($paths as $path) {
                array_push($permissions, self::GetPermissionsFromPath($path));
            }
            $permissions = call_user_func_array('array_merge', $permissions);
        } else {
            $permissions = self::GetPermissionsFromPath();
        }

        Permission::all()->each(function ($permission) use ($permissions) {
            if (!in_array($permission->name, $permissions))
                $permission->delete();
        });
    }

    /**
     * Fetch all current models.
     *
     * @param null $path
     * @return Collection
     */
    public static function GetPermissions($path = null): Collection
    {
        $methods = collect(scandir(app_path('Http/Controllers' . $path)))
                ->filter(function ($file_or_directory) {
                    return Str::contains($file_or_directory, 'php');
                })->map(function ($file) {
                    return str_replace('.php', '', $file);
                })->filter(function ($controller) {
                    return !in_array($controller, self::EXCEPTION_CONTROLLERS);
                })->map(function ($controller) use ($path) {
                    $prefix = ($path ? ltrim($path, '/') . "\\" : null);
                    return self::GetMethodsFromController($prefix . $controller);
                })->unique()->toArray() + [self::CUSTOM_PERMISSIONS];

        return !empty($methods) ? collect(call_user_func_array('array_merge', $methods)) : collect();
    }

    /**
     * Create any role with basic permissions on specific models.
     * @param $role
     * @param array|null $permissions
     * @return Role
     */
    public static function Create($role, array $permissions = null): Role
    {
        // at first, we will check if there's no permissions created we will generate and store all of permissions.
        if (!Permission::count())
            static::GenerateAndStorePermissions();

        // then we will create the role.
        if ($role instanceof Role)
            $created_role = $role;
        else {
            $created_role = Role::create(['name' => $role]);
        }

        if (!$created_role->permissions()->exists() || $created_role->id === 1)
            // after that we will assign specified permissions to newly created role.
            self::AssignPermissions($created_role, $permissions);

        return $created_role;
    }

    /**
     * Create any role with basic permissions on specific models.
     * @param Role $role
     * @param array|null $permissions
     * @return void
     */
    public static function AssignPermissions(Role $role, array $permissions = null): void
    {
        $permissions = $permissions !== null ? $permissions : Permission::all();
        $role->permissions()->sync($permissions);
    }

    /**
     * @param $controller
     * @return array
     */
    public static function GetMethodsFromController(string $controller): array
    {
        $base_controller_methods = get_class_methods("App\\Http\\Controllers\\Controller");
        $current_controller_methods = get_class_methods("App\\Http\\Controllers\\$controller");

        $methods = collect(array_diff($current_controller_methods, $base_controller_methods));
        $transformed_methods = [];

        $methods->filter(function ($method) {
            return $method != '__construct';
        })->each(function ($method) use ($controller, &$transformed_methods) {
            $controller_name = explode('-', str_replace('\\', '-', $controller));
            $controller = self::GetModelNameFromController($controller_name[1] ?? $controller_name[0]);
            if (in_array($controller, array_keys(self::CONTROLLERS_WITH_MULTI_MODULES))) {
                foreach (self::CONTROLLERS_WITH_MULTI_MODULES[$controller] as $module)
                    $transformed_methods[$module][] = self::PrepareMethodsName(Str::snake($method), $module);
            } else {
                $transformed_methods[$controller][] = self::PrepareMethodsName(Str::snake($method), $controller);
            }
        });

        return $transformed_methods;
    }

    /**
     * Prepare default methods name to be permission's name.
     *
     * @param string $method
     * @param string $controller
     *
     * @return string
     */
    public static function PrepareMethodsName(string $method, string $controller): string
    {
        return in_array($method, array_keys(self::BASIC_METHODS))
            ? self::BASIC_METHODS[$method] . "_{$controller}"
            : $method;
    }

    /**
     * Get model name from controller name.
     *
     * @param string $controller
     *
     * @return string
     */
    public static function GetModelNameFromController(string $controller): string
    {
        $controller = Str::snake($controller);
        return Str::singular(strtolower(str_replace('_controller', '', $controller)));
    }

    /**
     * @param string $route
     * @return string
     */
    public static function GetPermissionFromRoute(string $route = 'current'): string
    {
        if (!in_array($route, call_user_func_array('array_merge', array_values(self::CUSTOM_PERMISSIONS)))) {
            $route = $route == 'current' ? Route::current() : Route::getRoutes()->getByName($route);
            $namespace = $route->action['namespace'] ? $route->action['namespace'] . '\\' : '';
            $action_controller = str_replace($namespace, '', explode('@', $route->action['controller'])[0]);
            $controller_name = last(explode('-', str_replace('\\', '-', $action_controller)));
            $controller = self::GetModelNameFromController($controller_name);
            $action_method = $route->getActionMethod();
        } else {
            return $route;
        }

        return self::PrepareMethodsName(Str::snake($action_method), $controller);
    }

    /**
     * @param null $path
     * @return mixed
     */
    public static function GetPermissionsFromPath($path = null)
    {
        $permissions = static::GetPermissions(($path ? "/$path" : null));

        foreach ($permissions as $module => $module_permissions)
            foreach ($module_permissions as $permission)
                Permission::firstOrCreate(['name' => $permission, 'module' => $module]);

        $permissions = call_user_func_array('array_merge', $permissions->values()->toArray());

        return $permissions;
    }
}
