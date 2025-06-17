<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $messages = Message::where(function ($q) use ($user) {
            $q->where('from_user_id', auth()->id())
                ->where('to_user_id', $user->id);
        })->orWhere(function ($q) use ($user) {
            $q->where('from_user_id', $user->id)
                ->where('to_user_id', auth()->id());
        })->orderBy('created_at')->get();

        return view('pages.message.index', compact('user', 'messages'));
    }

    public function send(Request $request, User $user)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        Message::create([
            'from_user_id' => auth()->id(),
            'to_user_id' => $user->id,
            'content' => $request->message,
        ]);

        return redirect()->route('messages.index', $user->id);
    }
}