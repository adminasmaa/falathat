<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Responses\ResponsesInterface;
use App\Models\Message;
use App\Providers\APIServiceProvider;
use App\Services\Filters\Elements\MessagesFilter;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;

class MessagesController extends Controller
{
    /**
     * @var ResponsesInterface $responder
     */
    protected ResponsesInterface $responder;

    /**
     * MessagesController constructor.
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
     * @param MessagesFilter $messagesFilter
     * @return View
     */
    public function index(MessagesFilter $messagesFilter): View
    {
        Message::where('id', '>', 0)->update(['opened' => 1]);

        $messages = Message::filter($messagesFilter)
            ->orderBy('id', 'DESC')
            ->paginate(APIServiceProvider::ItemsPerPage);
        $messagesQuery = Message::filter($messagesFilter);

        return view('dashboard.messages.index', compact(['messages', 'messagesQuery']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return JsonResponse
     */
    public function destroy(Message $message): JsonResponse
    {
        $message->delete();

        return $this->responder->respond([
            'data' => ['message' => 'Message has been deleted successfully!']
        ]);
    }
}
