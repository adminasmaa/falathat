<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreSliderRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Slider;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\SlidersFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class SlidersController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * SlidersController constructor.
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
     * @param SlidersFilters $slidersFilters
     * @return View
     */
    public function index(SlidersFilters $slidersFilters): View
    {
        $sliders = Slider::filter($slidersFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $slidersQuery = Slider::filter($slidersFilters);

        return view('dashboard.sliders.index', compact(['sliders', 'slidersQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSliderRequest $request
     * @return JsonResponse
     */
    public function store(StoreSliderRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $slider = Slider::create($request->only(['image', 'icon', 'position', 'type', 'color']));

        $slider->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Slider has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Slider $slider
     * @return View
     */
    public function edit(Slider $slider): View
    {
        return view('dashboard.sliders.edit', compact(['slider']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Slider $slider
     * @param StoreSliderRequest $request
     * @return JsonResponse
     */
    public function update(Slider $slider, StoreSliderRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $slider->update($request->only(['image', 'icon', 'position', 'type', 'color']));

        $slider->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Slider has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Slider $slider
     * @return JsonResponse
     */
    public function destroy(Slider $slider): JsonResponse
    {
        DB::beginTransaction();

        $slider->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Slider has been deleted successfully!']
        ]);
    }
}
