<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreGalleryRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Media;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\MediaFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class GalleriesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * GalleriesController constructor.
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
        $images = Media::filter($mediaFilters)->whereNull('video')->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $imagesQuery = Media::filter($mediaFilters);

        return view('dashboard.galleries.index', compact(['images', 'imagesQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreGalleryRequest $request
     * @return JsonResponse
     */
    public function store(StoreGalleryRequest $request): JsonResponse
    {
        Media::create($request->only('image'));

        return $this->responder->respond([
            'data' => [
                'message' => 'Image has been added successfully!'
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Media $media
     * @return JsonResponse
     */
    public function destroy(Media $media): JsonResponse
    {
        DB::beginTransaction();

        $media->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Media has been deleted successfully!']
        ]);
    }
}
