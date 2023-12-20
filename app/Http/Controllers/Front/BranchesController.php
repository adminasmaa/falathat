<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Member;
use App\Models\Slider;
use Illuminate\Contracts\View\View;

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
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $branch = Branch::find((request('branch') ?: 0));
        $branches = Branch::where('parent', (request('branch') ?: 0))->get();

        return view('front.branches.index', compact(['branches', 'branch']));
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function show(Branch $branch): View
    {
        return view('front.branches.show', compact('branch'));
    }
}
