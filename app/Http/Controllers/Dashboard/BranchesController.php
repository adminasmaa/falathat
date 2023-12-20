<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreBranchRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Branch;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\BranchesFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BranchesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * BranchesController constructor.
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
     * @param BranchesFilters $branchesFilters
     * @return View
     */
    public function index(BranchesFilters $branchesFilters): View
    {
        $branches = Branch::filter($branchesFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $branchesQuery = Branch::filter($branchesFilters);

        return view('dashboard.branches.index', compact(['branches', 'branchesQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        $branches = Branch::where('parent', 0)->get();

        return view('dashboard.branches.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBranchRequest $request
     * @return JsonResponse
     */
    public function store(StoreBranchRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $branch = Branch::create($request->only(['image', 'location', 'parent']));

        $branch->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Branch has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return View
     */
    public function edit(Branch $branch): View
    {
        $branches = Branch::where('parent', 0)->where('id', '!=', $branch->id)->get();

        return view('dashboard.branches.edit', compact(['branch', 'branches']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Branch $branch
     * @param StoreBranchRequest $request
     * @return JsonResponse
     */
    public function update(Branch $branch, StoreBranchRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $branch->update($request->only(['image', 'location', 'parent']));

        $branch->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Branch has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return JsonResponse
     */
    public function destroy(Branch $branch): JsonResponse
    {
        DB::beginTransaction();

        $branch->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Branch has been deleted successfully!']
        ]);
    }
}
