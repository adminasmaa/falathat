<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreVideoRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Media;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\MediaFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class VideosController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * VideosController constructor.
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
     * @param MediaFilters $mediaFilters
     * @return View
     */
    public function index(MediaFilters $mediaFilters): View
    {
        $videos = Media::filter($mediaFilters)->whereNotNull('video')->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $videosQuery = Media::filter($mediaFilters);

        return view('dashboard.videos.index', compact(['videos', 'videosQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVideoRequest $request
     * @return JsonResponse
     */
    public function store(StoreVideoRequest $request): JsonResponse
    {
        Media::create($request->only(['thumbnail', 'video']));

        return $this->responder->respond([
            'data' => [
                'message' => 'Video has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Media $video
     * @return View
     */
    public function edit(Media $video): View
    {
        return view('dashboard.videos.edit', compact(['video']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Media $video
     * @param StoreVideoRequest $request
     * @return JsonResponse
     */
    public function update(Media $video, StoreVideoRequest $request): JsonResponse
    {
        $video->update($request->only(['thumbnail', 'video']));

        return $this->responder->respond([
            'data' => ['message' => 'Videos has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $media
     * @return JsonResponse
     */
    public function destroy(Media $video): JsonResponse
    {
        DB::beginTransaction();

        $video->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Videos has been deleted successfully!']
        ]);
    }
}
