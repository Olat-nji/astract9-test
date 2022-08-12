<?php

use Illuminate\Support\Facades\Auth;
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


/*
|--------------------------------------------------------------------------
| Auth Routes
|--------------------------------------------------------------------------
|
*/

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'index']);

    Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);
});

Route::post('/logout', [App\Http\Controllers\Auth\LogoutController::class, 'logout'])->name('logout');




/*
|--------------------------------------------------------------------------
| All Routes assecible to logged in users
|--------------------------------------------------------------------------
|
*/

Route::middleware(['auth'])->group(function () {








/*
|--------------------------------------------------------------------------
| Unverified users routes
|--------------------------------------------------------------------------
|
*/
    Route::get('/unverified', [App\Http\Controllers\Auth\UnverifiedController::class, 'index'])->name('unverified');
    Route::get('/unverified/message', [App\Http\Controllers\Auth\UnverifiedController::class, 'message']);






/*
|--------------------------------------------------------------------------
| Verified Users Routes
|--------------------------------------------------------------------------
|
*/


    Route::middleware(['verified'])->group(function () {

        Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');

        // Messages
        Route::get('/messages', [App\Http\Controllers\Main\MessagesController::class, 'index'])->name('messages');
        Route::get('/messages/create', [App\Http\Controllers\Main\MessagesController::class, 'create'])->name('messages');
        Route::post('/messages/create', [App\Http\Controllers\Main\MessagesController::class, 'store'])->name('messages');






/*
|--------------------------------------------------------------------------
| Admin-Only routes
|--------------------------------------------------------------------------
|
*/
        Route::middleware(['admin'])->group(function () {
            Route::get('/users', [App\Http\Controllers\Main\UsersController::class, 'index'])->name('users');
            Route::get('/users/activated', [App\Http\Controllers\Main\UsersController::class, 'activated'])->name('users');
            Route::post('/users/{id}/activate', [App\Http\Controllers\Main\UsersController::class, 'activate']);
        });
    });
});
