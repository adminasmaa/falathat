<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\StoreMemberRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Member;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\MembersFilters;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class MembersController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * MembersController constructor.
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
     * @param MembersFilters $committeesFilters
     * @return View
     */
    public function index(MembersFilters $committeesFilters): View
    {
        $members = Member::filter($committeesFilters)->orderBy('id', 'desc')->paginate(APIServiceProvider::ItemsPerPage);
        $membersQuery = Member::filter($committeesFilters);

        return view('dashboard.members.index', compact(['members', 'membersQuery']));
    }

    /**
     * Show the form for creating a new resource .
     *
     * @return View
     */
    public function create(): View
    {
        return view('dashboard.members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreMemberRequest $request
     * @return JsonResponse
     */
    public function store(StoreMemberRequest $request): JsonResponse
    {
        DB::beginTransaction();

        $member = Member::create($request->only(['image', 'phone', 'email', 'membership_number', 'type']));

        $member->translations()->attach($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => [
                'message' => 'Member has been added successfully!'
            ]
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Member $member
     * @return View
     */
    public function edit(Member $member): View
    {
        return view('dashboard.members.edit', compact(['member']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Member $member
     * @param StoreMemberRequest $request
     * @return JsonResponse
     */
    public function update(Member $member, StoreMemberRequest $request): JsonResponse
    {
        DB::beginTransaction();

        if ($request->CEO)
            Member::where('CEO', True)->update(['CEO' => FALSE]);

        $member->update($request->only(['image', 'phone', 'email', 'membership_number', 'type', 'CEO']));

        $member->translations()->sync($request->translated_attributes);

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Member has been updated successfully!']
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Member $member
     * @return JsonResponse
     */
    public function destroy(Member $member): JsonResponse
    {
        DB::beginTransaction();

        $member->delete();

        DB::commit();

        return $this->responder->respond([
            'data' => ['message' => 'Member has been deleted successfully!']
        ]);
    }
}
