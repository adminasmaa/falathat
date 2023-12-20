<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCommitteeRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Committee;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\CommitteesFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CommitteesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * CommitteesController constructor.
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
     * @param CommitteesFilters $committeesFilters
     * @return View
     */
    public function index(CommitteesFilters $committeesFilters): View
    {
        $committees = Committee::filter($committeesFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $committeesQuery = Committee::filter($committeesFilters);

        return view('dashboard.committees.index', compact(['committees', 'committeesQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.committees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommitteeRequest $request
     * @return JsonResponse
     */
    public function store(StoreCommitteeRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $committee = Committee::create();

        $committee->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Committee has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Committee $committee
     * @return View
     */
    public function edit(Committee $committee): View
    {
        return view('dashboard.committees.edit', compact(['committee']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Committee $committee
     * @param StoreCommitteeRequest $request
     * @return JsonResponse
     */
    public function update(Committee $committee, StoreCommitteeRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $committee->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Committee has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Committee $committee
     * @return JsonResponse
     */
    public function destroy(Committee $committee): JsonResponse
    {
        DB::beginTransaction();

        $committee->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Committee has been deleted successfully!']
        ]);
    }
}
