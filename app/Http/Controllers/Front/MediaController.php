<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Models\Media;
use Illuminate\Contracts\View\View;

class MediaController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * MediaController constructor.
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
        return view('front.media-center.media.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function images(): View
    {
        $images = Media::whereNUll('video')->orderBy('id', 'DESC')->get();

        return view('front.media-center.media.images', compact('images'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function videos(): View
    {
        $videos = Media::whereNUll('image')->orderBy('id', 'DESC')->get();

        return view('front.media-center.media.videos', compact('videos'));
    }
}
