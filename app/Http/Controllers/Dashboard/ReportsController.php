<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreReportRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Report;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\ReportsFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * ReportsController constructor.
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
     * @param ReportsFilters $reportsFilters
     * @return View
     */
    public function index(ReportsFilters $reportsFilters): View
    {
        $reports = Report::filter($reportsFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $reportsQuery = Report::filter($reportsFilters);

        return view('dashboard.reports.index', compact(['reports', 'reportsQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.reports.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReportRequest $request
     * @return JsonResponse
     */
    public function store(StoreReportRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $report = Report::create();

        $report->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Report has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Report $report
     * @return View
     */
    public function edit(Report $report): View
    {
        return view('dashboard.reports.edit', compact(['report']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Report $report
     * @param StoreReportRequest $request
     * @return JsonResponse
     */
    public function update(Report $report, StoreReportRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $report->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Report has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @return JsonResponse
     */
    public function destroy(Report $report): JsonResponse
    {
        DB::beginTransaction();

        $report->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Report has been deleted successfully!']
        ]);
    }
}
