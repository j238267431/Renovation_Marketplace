<?php

namespace App\Http\Controllers\Account;

use App\Events\MessageSent;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class ChatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show chats
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('account.chat');
    }

    /**
     * Fetch all messages
     *
     * @return Message
     */
    public function fetchMessages(Request $request)
    {
        $toUserId = $request->get('toUserId');
        $messages = Message::query()
            ->where('user_id', '=', Auth::id())
            ->orWhere('to_user_id', '=', Auth::id())
            ->orWhere('user_id', '=', $toUserId)
            ->orWhere('to_user_id', '=', $toUserId)
            ->with('user')
            ->get();
        return $messages;
//        return Message::with('user')->get();
    }

    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    /**
     * Persist message to database
     *
     * @param  Request $request
     * @return Response
     */
    public function sendMessage(Request $request)
    {
        $to_user_id = $request->input('touserid');
        $message = $request->input('message')['message'];
        $userId = Auth::id();
        $user = Auth::user();
        $message = Message::query()->create([
            'message' => $message,
            'user_id' => $userId,
            'to_user_id' => $to_user_id,
        ]);
//        $message = $user->messages()->create([
//            'message' => $request->input('message'),
//        ]);

        broadcast(new MessageSent($user, $message))->toOthers();
        return ['status' => 'Message Sent!'];
    }
}
