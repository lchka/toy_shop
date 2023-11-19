<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ToyController as AdminToyController;
use App\Http\Controllers\User\ToyController as UserToyController;





// this is used to route to all the possible view variations made with the toycontroller

// Route::resource('/toys',ToyController::class);

// routes/web.php


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('/admin/toys', AdminToyController::class)->middleware(['auth'])->names('admin.toys');

Route::resource('/user/toys', UserToyController::class)->middleware(['auth'])->names('user.toys')->only(['index','show']);
require __DIR__.'/auth.php';
