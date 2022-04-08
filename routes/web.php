<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TokenController;
use Illuminate\Http\Request;

Route::group(['middleware' => ['auth']], function() {
    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource("/users", UserController::class);
    Route::resource("/posts", PostController::class);
    Route::get("/token", ([TokenController::class, "index"]));
});

require __DIR__.'/auth.php';