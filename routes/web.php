<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;

use Illuminate\Support\Facades\Route;

// toycontroller
use App\Http\Controllers\Admin\ToyController as AdminToyController; //aliases are used in order to make sure laravel calls for the right controller/folder
use App\Http\Controllers\User\ToyController as UserToyController;
// animalcontroller
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\User\AnimalController as UserAnimalController;
// petstorecontroller
use App\Http\Controllers\Admin\PetstoreController as AdminPetstoreController;
use App\Http\Controllers\User\PetstoreController as UserPetstoreController;


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


Route::resource('Admin/toys', AdminToyController::class)->middleware(['auth'])->names('admin.toys'); //deleted / before admin might break
Route::resource('User/toys', UserToyController::class)->middleware(['auth'])->names('user.toys')->only(['index', 'show']);
Route::resource('Admin/animals', AdminAnimalController::class)->middleware(['auth'])->names('admin.animals');
Route::resource('User/animals', UserAnimalController::class)->middleware(['auth'])->names('user.animals')->only(['index', 'show']);
Route::resource('Admin/petstores', AdminPetstoreController::class)->middleware(['auth'])->names('admin.petstores');
Route::resource('User/petstores', UserPetstoreController::class)->middleware(['auth'])->names('user.petstores')->only(['index', 'show']);


// Route for showing the form to promote users to admins
Route::get('admin/promote', [RegisteredUserController::class, 'showPromoteForm'])->middleware(['auth'])->name('admin.showPromoteForm');

// Route for handling user promotion
Route::post('admin/promote', [RegisteredUserController::class, 'promoteUser'])->middleware(['auth'])->name('admin.promoteUser');



require __DIR__ . '/auth.php';