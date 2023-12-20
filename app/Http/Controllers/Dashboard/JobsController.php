<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCommitteeRequest;
use App\Http\Requests\Dashboard\StoreJobRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Committee;
use App\Models\Job;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\CommitteesFilters;
use App\Services\Filters\Elements\JobsFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @param JobsFilters $jobsFilters
     * @return View
     */
    public function index(JobsFilters $jobsFilters): View
    {
        $jobs = Job::filter($jobsFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $jobsQuery = Job::filter($jobsFilters);

        return view('dashboard.jobs.index', compact(['jobs', 'jobsQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreJobRequest $request
     * @return JsonResponse
     */
    public function store(StoreJobRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $job = Job::create();

        $job->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Job has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Job $job
     * @return View
     */
    public function edit(Job $job): View
    {
        return view('dashboard.jobs.edit', compact(['job']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Job $job
     * @param StoreJobRequest $request
     * @return JsonResponse
     */
    public function update(Job $job, StoreJobRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $job->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Job has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Job $job
     * @return JsonResponse
     */
    public function destroy(Job $job): JsonResponse
    {
        DB::beginTransaction();

        $job->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Job has been deleted successfully!']
        ]);
    }
}
