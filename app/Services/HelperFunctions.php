<?php

use App\Services\Roles\RolesGenerator;

/**
 * @param $route_name
 * @return array|string
 */
function get_permission($route_name): array|string
{
    $permission = null;

    if (is_string($route_name))
        $permission = RolesGenerator::GetPermissionFromRoute($route_name);
    elseif (is_array($route_name))
        foreach ($route_name as $route)
            $permission[] = RolesGenerator::GetPermissionFromRoute($route);

    return $permission;
}
