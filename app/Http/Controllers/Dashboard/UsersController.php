<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreUserRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Role;
use App\Models\User;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\UsersFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * UsersController constructor.
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
     * @param UsersFilters $usersFilters
     * @return View
     */
    public function index(UsersFilters $usersFilters): View
    {
        $users = User::filter($usersFilters)->where('id', '!=', 1)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $roles = Role::where('id', '!=', 1)->get();
        $activeAdminsCount = User::filter($usersFilters)->where('id', '!=', 1)->where('status', 1)->count();
        $allAdminsCount = User::filter($usersFilters)->where('id', '!=', 1)->count();

        return view('dashboard.users.index', compact(['users', 'roles', 'activeAdminsCount', 'allAdminsCount']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        $roles = Role::where('id', '!=', 1)->get();

        return view('dashboard.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function store(StoreUserRequest $request): JsonResponse
    {
        $user = User::create($request->only(['name', 'email', 'status']) + ['password' => bcrypt($request->password)]);

        $user->roles()->attach($request->role_id);

        return $this->responder->respond([
            'data' => [
                'message' => 'User has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return View
     */
    public function edit(User $user): View
    {
        if ($user->id === 1) abort(401);

        $roles = Role::where('id', '!=', 1)->get();

        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param User $user
     * @param StoreUserRequest $request
     * @return JsonResponse
     */
    public function update(User $user, StoreUserRequest $request): JsonResponse
    {
        $user->update($request->only(['name', 'email', 'status']));

        if ($request->password)
            $user->update(['password' => bcrypt($request->password)]);

        $user->roles()->sync($request->role_id);

        return $this->responder->respond([
            'data' => ['message' => 'User has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return JsonResponse
     */
    public function destroy(User $user): JsonResponse
    {
        if ($user->id === 1) abort(401);

        $user->roles()->detach();

        $user->delete();

        return $this->responder->respond([
            'data' => ['message' => 'User has been deleted successfully!']
        ]);
    }
}
