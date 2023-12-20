<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreCommitteeMemberRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\CommitteeMembersFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class CommitteeMembersController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * CommitteeMembersController constructor.
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
     * @param Committee $committee
     * @param CommitteeMembersFilters $committeesFilters
     * @return View
     */
    public function index(Committee $committee, CommitteeMembersFilters $committeesFilters): View
    {
        $members = $committee->members()->filter($committeesFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $membersQuery = $committee->members()->filter($committeesFilters);

        return view('dashboard.committees.members.index', compact(['committee', 'members', 'membersQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(Committee $committee): View
    {
        return view('dashboard.committees.members.create', compact('committee'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCommitteeMemberRequest $request
     * @return JsonResponse
     */
    public function store(Committee $committee, StoreCommitteeMemberRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $member = $committee->members()->create($request->only(['membership_number', 'image']));

        $member->translations()->attach($request->translated_attributes);

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
     * @param CommitteeMember $member
     * @return View
     */
    public function edit(Committee $committee, CommitteeMember $member): View
    {
        return view('dashboard.committees.members.edit', compact(['committee', 'member']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CommitteeMember $member
     * @param StoreCommitteeMemberRequest $request
     * @return JsonResponse
     */
    public function update(Committee $committee, CommitteeMember $member, StoreCommitteeMemberRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $member->update($request->only(['membership_number', 'image']));

        $member->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Member has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param CommitteeMember $member
     * @return JsonResponse
     */
    public function destroy(Committee $committee, CommitteeMember $member): JsonResponse
    {
        DB::beginTransaction();

        $member->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Member has been deleted successfully!']
        ]);
    }
}
