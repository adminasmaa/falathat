<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use Illuminate\Contracts\View\View;

class NewsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * NewsController constructor.
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
        $news = Activity::where('type', Activity::NEWS)->get();

        return view('front.media-center.news.index', compact(['news']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Activity $news
     * @return View
     */
    public function show(Activity $news): View
    {
        $latest_news = Activity::where('type', Activity::NEWS)->orderBy('id', 'DESC')->take(3)->get();

        return view('front.media-center.news.show', compact('news', 'latest_news'));
    }
}
