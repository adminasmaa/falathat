<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\Filters\Elements\RolesFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreRoleRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Permission;
use App\Models\Role;
use App\Providers\APIServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * RolesController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @param RolesFilters $rolesFilters
     * @return View
     */
    public function index(RolesFilters $rolesFilters): View
    {
        $roles = Role::where('id', '!=', 1)->filter($rolesFilters)->paginate(APIServiceProvider::ItemsPerPage);

        return view('dashboard.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        $permissions = Permission::all()->groupBy('module');

        return view('dashboard.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function store(StoreRoleRequest $request): JsonResponse
    {
        $role = Role::create($request->only(['name', 'status']));

        if ($request->permissions)
            $role->permissions()->attach($request->permissions);

        return $this->responder->respond([
            'data' => ['message' => 'Role has been added successfully!']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return View
     */
    public function edit(Role $role): View
    {
        if (in_array($role->id, [1])) abort(401);

        $permissions = Permission::all()->groupBy('module');

        return view('dashboard.roles.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Role $role
     * @param StoreRoleRequest $request
     * @return JsonResponse
     */
    public function update(Role $role, StoreRoleRequest $request): JsonResponse
    {
        $role->update($request->only(['name', 'status']));

        if ($request->permissions)
            $role->permissions()->sync($request->permissions);

        return $this->responder->respond([
            'data' => ['message' => 'Role has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return JsonResponse
     */
    public function destroy(Role $role): JsonResponse
    {
        if (in_array($role->id, [1]))
            return $this->responder->respondAuthorizationError();

        $role->permissions()->detach();

        $role->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Role has been deleted successfully!']
        ]);
    }
}
