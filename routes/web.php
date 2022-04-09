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

    Route::get('users/fetch', [UserController::class, 'fetch'])->name('users-fetch');
    Route::resource("/users", UserController::class);

    Route::get('posts/fetch', [PostController::class, 'fetch'])->name('posts-fetch');
    Route::resource("/posts", PostController::class);

    Route::resource("/tokens", TokenController::class);
});

require __DIR__.'/auth.php';