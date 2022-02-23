<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create(){

        $users = User::where('id', '<>', auth()->user()->id)->pluck('name', 'id');

        return view('message.create', compact('users'));
    }

    public function show(Message $message){
        return view('message.show', compact('message'));
    }

    public function store(Request $request){
        $request->validate([
            'subject' => 'required',
            'body' => 'required',
            'to_user_id' => 'required'
        ]);

        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
        ]);

        return redirect()->route('messages.create');
    }
}
