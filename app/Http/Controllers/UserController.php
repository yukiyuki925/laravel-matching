<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Swipe;

class UserController extends Controller
{
    public function index()
    {
        // すでにswipeしたuserIdを取得
        $swipedUserIds = Swipe::where('from_user_id', auth()->id())->pluck('to_user_id');

        // swipeしていないuserを取得
        $user = User::whereKeyNot(auth()->id())->whereNotIn('id', $swipedUserIds)->first();
        return view('pages.user.index', [
            'user' => $user
        ]);
    }
}
