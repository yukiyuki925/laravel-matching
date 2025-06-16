<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swipe;

class SwipeController extends Controller
{
    public function store(Request $request)
    {
        $swipe = new Swipe();
        $swipe->from_user_id = auth()->id();
        $swipe->to_user_id = $request->input('to_user_id');
        $swipe->is_like = $request->input('is_like');;
        $swipe->save();

        return redirect(route('users.index'));
    }
}