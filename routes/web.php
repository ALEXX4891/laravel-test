<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegLogController;


Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::controller(RegLogController::class)->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/register', 'create');
        Route::post('/register', 'register');

        Route::get('/login', 'edit')->name('login');
        Route::post('/login', 'login');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', 'logout');
    });
});
