<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UrlShortController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [UserController::class,'Home'])->name('home.page');
Route::get('/register', [UserController::class, 'RegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'UserRegister'])->name('register');
Route::get('/login', [UserController::class, 'LoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'UserLogin'])->name('login');


Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/short-url', [UrlShortController::class, 'createShortUrl'])->name('short.url');
    Route::get('/dashboard', [UrlShortController::class, 'showDashboard'])->name('user.dashboard');
    Route::get('/url-form', [UserController::class, 'showUrlForm'])->name('url.form');
    Route::delete('/delete-url/{id}', [UrlShortController::class, 'DeleteUrl'])->name('url.delete');
    Route::post('/logout', [AuthController::class, 'UserLogout'])->name('user.logout');
    Route::get('/profile', [AuthController::class, 'showProfile'])->name('profile.view');
    Route::post('profile/update', [AuthController::class, 'updateProfile'])->name('profile.update');

});


Route::get('/{smallUrl}', [UrlShortController::class, 'redirectToBigUrl'])->name('redirect.toBigUrl');


    
