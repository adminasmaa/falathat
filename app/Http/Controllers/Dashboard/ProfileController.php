<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ChangePasswordRequest;
use App\Http\Requests\Dashboard\UpdateProfileRequest;
use App\Http\Responses\ResponsesInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function bcrypt;
use function view;

class ProfileController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * ProfileController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('dashboard.profile.show');
    }

    /**
     * @return View
     */
    public function settings(): View
    {
        return view('dashboard.profile.settings');
    }

    /**
     * @return View
     */
    public function changePassword(): View
    {
        return view('dashboard.profile.change_password');
    }

    /**
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function updateProfile(UpdateProfileRequest $request): JsonResponse
    {
        Auth::user()->update($request->all());

        return $this->responder->respond([
            'data' => ['message' => 'Your account has been updated successfully.']
        ]);
    }

    /**
     * @param ChangePasswordRequest $request
     * @return JsonResponse
     */
    public function updatePassword(ChangePasswordRequest $request): JsonResponse
    {
        if (!Hash::check($request->password, Auth::user()->getAuthPassword())) {
            return $this->responder->respondWithValidationError('Invalid old password.');
        }

        Auth::user()->update(['password' => bcrypt($request->new_password)]);

        return $this->responder->respond([
            'data' => ['message' => 'Your password has been updated successfully.']
        ]);
    }
}
