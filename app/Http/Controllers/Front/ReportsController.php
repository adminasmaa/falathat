<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Report;
use App\Models\ReportFile;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

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
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $reports = Report::orderBy('id', 'DESC')->get();

        return view('front.media-center.reports.index', compact(['reports']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Report $report
     * @return View
     */
    public function show(Report $report): View
    {
        $files = $report->files()->orderBy('id', 'DESC')->get();

        return view('front.media-center.reports.show', compact(['files', 'report']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param ReportFile $file
     * @return BinaryFileResponse
     */
    public function download(ReportFile $file)
    {
        return Response::download('storage/' . $file->file);
    }
}
