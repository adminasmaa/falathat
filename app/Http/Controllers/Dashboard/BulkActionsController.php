<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\BulkActions\Admins\BulkChangeStatusesRequest;
use App\Http\Requests\Dashboard\BulkActions\Admins\BulkDeleteRequest;
use App\Http\Responses\ResponsesInterface;
use App\Models\Activity;
use App\Models\Branch;
use App\Models\Committee;
use App\Models\CommitteeMember;
use App\Models\Job;
use App\Models\Media;
use App\Models\Member;
use App\Models\Message;
use App\Models\Report;
use App\Models\ReportFile;
use App\Models\Role;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class BulkActionsController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected $responder;

    /**
     * BulkActionsController constructor.
     * @param ResponsesInterface $responder
     */
    public function __construct(ResponsesInterface $responder)
    {
        $this->middleware('auth');
        $this->responder = $responder;
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function adminChangeStatus(BulkChangeStatusesRequest $request): JsonResponse
    {
        User::whereIn('id', $request->bulk_ids)->update(['status' => $request->status]);

        return $this->responder->respond([
            'data' => ['message' => 'Statuses has been updated successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function rolesChangeStatus(BulkChangeStatusesRequest $request): JsonResponse
    {
        Role::whereIn('id', $request->bulk_ids)->update(['status' => $request->status]);

        return $this->responder->respond([
            'data' => ['message' => 'Roles has been updated successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function adminDelete(BulkDeleteRequest $request): JsonResponse
    {
        User::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Admins has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function roleDelete(BulkDeleteRequest $request): JsonResponse
    {
        Role::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Role has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function messagesDelete(BulkDeleteRequest $request): JsonResponse
    {
        Message::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Messages has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function branchesDelete(BulkDeleteRequest $request): JsonResponse
    {
        Branch::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Branches has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function committeesDelete(BulkDeleteRequest $request): JsonResponse
    {
        Committee::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Committees has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function committeeMembersDelete(BulkDeleteRequest $request): JsonResponse
    {
        CommitteeMember::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Members has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function jobsDelete(BulkDeleteRequest $request): JsonResponse
    {
        Job::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Jobs has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function galleriesDelete(BulkDeleteRequest $request): JsonResponse
    {
        Media::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Images has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function videosDelete(BulkDeleteRequest $request): JsonResponse
    {
        Media::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Videos has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function membersDelete(BulkDeleteRequest $request): JsonResponse
    {
        Member::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Members has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function reportsDelete(BulkDeleteRequest $request): JsonResponse
    {
        Report::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Reports has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function reportFilesDelete(BulkDeleteRequest $request): JsonResponse
    {
        ReportFile::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Files has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function slidersDelete(BulkDeleteRequest $request): JsonResponse
    {
        Slider::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Sliders has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function activitiesDelete(BulkDeleteRequest $request): JsonResponse
    {
        Activity::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Activities has been deleted successfully!']
        ]);
    }

    /**
     * Bulk Change Status.
     *
     * @param BulkChangeStatusesRequest $request
     *
     * @return JsonResponse
     */
    public function newsDelete(BulkDeleteRequest $request): JsonResponse
    {
        Activity::whereIn('id', $request->bulk_ids)->delete();

        return $this->responder->respond([
            'data' => ['message' => 'News has been deleted successfully!']
        ]);
    }
}
