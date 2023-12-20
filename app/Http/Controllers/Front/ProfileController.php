<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\UpdateProfileRequest;
use App\Http\Responses\ResponsesInterface;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
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
        $this->middleware('auth:member');
        $this->responder = $responder;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        return view('front.auth.profile');
    }

    /**
     * @param UpdateProfileRequest $request
     * @return RedirectResponse
     */
    public function update(UpdateProfileRequest $request): JsonResponse
    {
        Auth::guard('member')->user()->update($request->all());

        return redirect()->back()->with(['status' => 'success', 'message' => 'لقد تم تحديث البيانات بنجاح!']);
    }
}
