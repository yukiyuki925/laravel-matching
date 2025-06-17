<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;

class MatchController extends Controller
{
    public function index(Request $request)
    {
        // 自分へいいねしてくれたユーザー
        $likedUserId = Swipe::where('to_user_id', auth()->id())
            ->where('is_like', true)
            ->pluck('from_user_id');

        // いいねしてくれたユーザーへ自分がいいねしたユーザー　＝　マッチしたユーザー
        $matchedUsers = Swipe::where('from_user_id', auth()->id())
            ->whereIn('to_user_id', $likedUserId)
            ->where('is_like', true)
            ->with('toUser')
            ->get();

        return view('pages.match.index', [
            'matchedUsers' => $matchedUsers
        ]);
    }
}