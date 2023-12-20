<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreActivityRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\ActivitiesFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @param ActivitiesFilters $activitiesFilters
     * @return View
     */
    public function index(ActivitiesFilters $activitiesFilters): View
    {
        $activities = Activity::filter($activitiesFilters)
            ->where('type', Activity::ACTIVITY)
            ->orderBy('id', 'desc')
            ->paginate(APIServiceProvider::ItemsPerPage);
        $activitiesQuery = Activity::filter($activitiesFilters);

        return view('dashboard.activities.index', compact(['activities', 'activitiesQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreActivityRequest $request
     * @return JsonResponse
     */
    public function store(StoreActivityRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $activity = Activity::create($request->only(['image', 'thumbnail']) + ['type' => Activity::ACTIVITY]);

        $activity->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Activity has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $activity
     * @return View
     */
    public function edit(Activity $activity): View
    {
        return view('dashboard.activities.edit', compact(['activity']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Activity $activity
     * @param StoreActivityRequest $request
     * @return JsonResponse
     */
    public function update(Activity $activity, StoreActivityRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $activity->update($request->only(['image', 'thumbnail']));

        $activity->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Activity has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $activity
     * @return JsonResponse
     */
    public function destroy(Activity $activity): JsonResponse
    {
        DB::beginTransaction();

        $activity->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Activity has been deleted successfully!']
        ]);
    }
}
