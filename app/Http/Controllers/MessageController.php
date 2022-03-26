<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;
use Illuminate\Http\Request;


class MessageController extends Controller
{
    public function create($id){

        $user = User::findOrFail($id);
        

        return view('message.create', compact('user'));
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

        $user = User::find($request->to_user_id);
        $user->notify(new MessageSent($message ));

        return redirect()->route('users.index');
    }
}
