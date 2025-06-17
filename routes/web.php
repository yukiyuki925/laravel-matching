<?php

use App\Http\Controllers\MatchController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\SwipeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/swipes', [SwipeController::class, 'store'])->name('swipes.store');
    Route::get('/matches', [MatchController::class, 'index'])->name('matches.index');
    Route::get('/messages/{user}', [MessageController::class, 'index'])->name('messages.index');
    Route::post('/send/{user}', [MessageController::class, 'send'])->name('messages.send');
});
