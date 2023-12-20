<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreReportFileRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Report;
use App\Models\ReportFile;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\ReportFilesFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class ReportFilesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * ReportFilesController constructor.
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
     * @param Report $report
     * @param ReportFilesFilters $reportFilesFilters
     * @return View
     */
    public function index(Report $report, ReportFilesFilters $reportFilesFilters): View
    {
        $files = $report->files()->filter($reportFilesFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $filesQuery = $report->files()->filter($reportFilesFilters);

        return view('dashboard.reports.files.index', compact(['report', 'files', 'filesQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @param Report $report
     * @return View
     */
    public function create(Report $report): View
    {
        return view('dashboard.reports.files.create', compact('report'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreReportFileRequest $request
     * @return JsonResponse
     */
    public function store(Report $report, StoreReportFileRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $report->files()->create($request->only(['file']));

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'File has been added successfully!'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Report $report
     * @param ReportFile $file
     * @return JsonResponse
     */
    public function destroy(Report $report, ReportFile $file): JsonResponse
    {
        DB::beginTransaction();

        $report->files()->where('id', $file->id)->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'File has been deleted successfully!']
        ]);
    }
}
