<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Guest\GuestController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return to_route('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin
require_once __DIR__.'/admin.php';

// guest
require_once __DIR__.'/guest.php';

// // guest
// Route::get('home', [GuestController::class,'home'])->name('home');
