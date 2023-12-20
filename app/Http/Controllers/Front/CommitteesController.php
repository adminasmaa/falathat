<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Committee;
use Illuminate\Contracts\View\View;

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
        $this->responder = $responder;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $committees = Committee::all();

        return view('front.committees.index', compact(['committees']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param Committee $committee
     * @return View
     */
    public function show(Committee $committee): View
    {
        $members = $committee->members()->get();

        return view('front.committees.show', compact('committee', 'members'));
    }
}
