<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Slider;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * HomeController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $sliders = Slider::all();
        $ceo = Member::where('CEO', True)->first();
        $branches = Branch::where('parent', 0)->orderBy('id', 'DESC')->take(3)->get();
        $latest_news = Activity::orderBy('id', 'DESC')->take(6)->get();

        return view('front.home', compact('sliders', 'ceo', 'branches', 'latest_news'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function about(): View
    {
        return view('front.about');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function members(): View
    {
        $CEOs = Member::where('type', Member::BOD_MEMBER)->get();

        $members = Member::where('type', Member::COMMITTEE_MEMBER)->get();

        return view('front.members', compact('CEOs', 'members'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function mediaCenter(): View
    {
        return view('front.media-center.index');
    }
}
