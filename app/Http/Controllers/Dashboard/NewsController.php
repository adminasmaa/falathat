<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreNewsRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\NewsFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

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
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @param NewsFilters $newsFilters
     * @return View
     */
    public function index(NewsFilters $newsFilters): View
    {
        $news = Activity::filter($newsFilters)
            ->where('type', Activity::NEWS)
            ->orderBy('id', 'desc')
            ->paginate(APIServiceProvider::ItemsPerPage);
        $newsQuery = Activity::filter($newsFilters);

        return view('dashboard.news.index', compact(['news', 'newsQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNewsRequest $request
     * @return JsonResponse
     */
    public function store(StoreNewsRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $news = Activity::create($request->only(['image', 'thumbnail']) + ['type' => Activity::NEWS]);

        $news->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'News has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Activity $news
     * @return View
     */
    public function edit(Activity $news): View
    {
        return view('dashboard.news.edit', compact(['news']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Activity $news
     * @param StoreNewsRequest $request
     * @return JsonResponse
     */
    public function update(Activity $news, StoreNewsRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $news->update($request->only(['image', 'thumbnail']));

        $news->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'News has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Activity $news
     * @return JsonResponse
     */
    public function destroy(Activity $news): JsonResponse
    {
        DB::beginTransaction();

        $news->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'News has been deleted successfully!']
        ]);
    }
}
