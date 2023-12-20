<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\LoginRequest;
use App\Http\Requests\Front\ResetPasswordRequest;
use App\Http\Requests\Front\SendResetLinkRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\FrontMember;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticationController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * AuthenticationController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->responder = $responder;
    }

    /**
     * @return View|RedirectResponse
     */
    public function create(): View|RedirectResponse
    {
        if (Auth::guard('member')->check())
            return redirect()->route('front.home');

        return view('front.auth.login');
    }

    /**
     * @param LoginRequest $request
     * @return RedirectResponse
     *
     * @throws ValidationException
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect(route('front.home'));
    }

    /**
     * Handle the request for viewing forget page.
     *
     * @return View
     */
    public function forget()
    {
        return view('front.auth.forget');
    }

    /**
     * Handle the request for resting password.
     *
     * @param SendResetLinkRequest $request
     * @return RedirectResponse
     */
    public function sendResetLink(SendResetLinkRequest $request)
    {
        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->with(['status' => __($status)])
            : back()->withErrors(['email' => __($status)]);
    }

    /**
     * Handle the request for viewing forget page.
     *
     * @return View
     */
    public function resetPage(string $token)
    {
        return view('front.auth.reset', ['token' => $token]);
    }

    /**
     * @param ResetPasswordRequest $request
     * @return RedirectResponse
     */
    public function reset(ResetPasswordRequest $request)
    {
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (FrontMember $member, string $password) {
                $member->forceFill(['password' => $password]);
                $member->save();
                event(new PasswordReset($member));
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('front.login.create')->with('status', __($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('member')->logout();

        // $request->session()->invalidate();

        // $request->session()->regenerateToken();

        return redirect('/');
    }
}
