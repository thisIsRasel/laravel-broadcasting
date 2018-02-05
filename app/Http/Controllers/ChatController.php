<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Model\User;
use App\Model\Inbox;
use App\Events\ChatEvent;

class ChatController extends Controller
{
    public function __constructor() {


    }

    public function index($buddy_id) {

    	$buddy = User::find($buddy_id);

    	return view('chat.compose', compact('buddy'));
    }

    public function store(Request $request) {

    	$receiver_id = $request->input('receiver_id');
    	$message = $request->input('message');

    	/*$inbox = new Inbox;
    	$inbox->sender_id = Auth::user()->id;
    	$inbox->receiver_id = $receiver_id;
    	$inbox->message = $message;

    	$inbox_id = $inbox->save();*/

    	$sender = User::findOrFail(Auth::user()->id);
    	$receiver = User::findOrFail($receiver_id);
    	event(new ChatEvent($sender, $receiver, $message));

    	return 'success';
    }
}
