<?php

namespace App\Http\Controllers\Front\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\RegistrationRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\FrontMember;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * RegistrationController constructor.
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

        return view('front.auth.register');
    }

    /**
     * @param RegistrationRequest $request
     * @return RedirectResponse|JsonResponse
     */
    public function store(RegistrationRequest $request): RedirectResponse|JsonResponse
    {
        $member = FrontMember::create($request->all());

        Auth::guard('member')->login($member);

        return redirect()->route('front.home');
    }
}
