<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
});