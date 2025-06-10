<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\AppController;
use App\Http\Controllers\DashController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', [DashController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('positions', [DashController::class, 'positions'])
    ->middleware(['auth', 'verified'])
    ->name('positions');


Route::resource('groups', GroupController::class)
    ->middleware(['auth', 'verified'])
    ->names('groups');

Route::get('use-code', [DashController::class, 'useCode'])
    ->middleware(['auth', 'verified'])
    ->name('use-code');

Route::post('use-invite-code', [AppController::class, 'useInviteCode'])
    ->middleware(['auth', 'verified'])
    ->name('use-invite-code');

Route::post('exit-group', [AppController::class, 'exitGroup'])
    ->middleware(['auth', 'verified'])
    ->name('exit-group');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
