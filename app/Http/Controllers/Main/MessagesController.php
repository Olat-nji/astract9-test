<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        return view('messages.index', [
            'messages' => (auth()->user()->is_admin)?Message::orderBy('id', 'desc')->get():Message::orderBy('id', 'desc')->where('user_id',auth()->id())->get()
        ]);
    }

    

    public function store(Request $request)
    {
        $message = new Message();
        $message->user_id = auth()->user()->id;
        $message->message = $request->input('message');
        $message->save();
        return redirect()->back()->with('success','Message Sent!');
    }
}
