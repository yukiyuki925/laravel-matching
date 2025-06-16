<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(2);
        return view('pages.user.index', [
            'user' => $user
        ]);
    }
}