<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use Illuminate\Contracts\View\View;

class ActivitiesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * ActivitiesController constructor.
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
        $activities = Activity::where('type', Activity::ACTIVITY)->get();

        return view('front.media-center.activities.index', compact(['activities']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Activity $activity
     * @return View
     */
    public function show(Activity $activity): View
    {
        $latest_activities = Activity::where('type', Activity::ACTIVITY)->orderBy('id', 'DESC')->take(3)->get();

        return view('front.media-center.activities.show', compact('activity', 'latest_activities'));
    }
}
