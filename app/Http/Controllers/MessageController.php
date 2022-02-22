<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Message $message){
        return view('message.index', compact('message'));
    }

    public function show(Message $message){
        return view('message.show', compact('message'));
    }

    public function store(Request $request){

    }
}
