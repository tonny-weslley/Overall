<?php

use App\Http\Controllers\GroupController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('positions', function () {
    return Inertia::render('Positions');
})->middleware(['auth', 'verified'])->name('positions');

Route::resource('groups', GroupController::class)
    ->middleware(['auth', 'verified'])
    ->names('groups');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
