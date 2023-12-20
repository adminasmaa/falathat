<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Requests\Front\StoreJobRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Interviewee;
use App\Models\Job;
use Illuminate\Contracts\View\View;

class JobsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * JobsController constructor.
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
        $jobs = Job::all();

        return view('front.jobs.index', compact(['jobs']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param StoreJobRequest $request
     * @return View
     */
    public function store(StoreJobRequest $request): View
    {
        Interviewee::create($request->all());

        return $this->responder->respond(['message' => 'لقد تم تقديم الطلب بنجاح']);
    }
}
