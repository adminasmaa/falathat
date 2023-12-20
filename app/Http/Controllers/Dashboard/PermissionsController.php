<?php

namespace App\Http\Controllers\Dashboard;

use App\Services\Filters\Elements\PermissionsFilters;
use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\UpdatePermissionRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Permission;
use App\Providers\APIServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class PermissionsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * PermissionsController constructor.
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
     * @param PermissionsFilters $permissionsFilters
     * @return View
     */
    public function index(PermissionsFilters $permissionsFilters): View
    {
        $permissions = Permission::filter($permissionsFilters)->paginate(APIServiceProvider::ItemsPerPage);

        return view('dashboard.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Permission $permission
     * @return View
     */
    public function edit(Permission $permission): View
    {
        return view('dashboard.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Permission $permission
     * @param UpdatePermissionRequest $request
     * @return JsonResponse
     */
    public function update(Permission $permission, UpdatePermissionRequest $request): JsonResponse
    {
        $permission->update($request->only(['nice_name', 'activity_description']));

        return $this->responder->respond([
            'data' => ['message' => 'Permission has been updated successfully.']
        ]);
    }
}
