<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToyController;





Route::resource('/toys',ToyController::class);

