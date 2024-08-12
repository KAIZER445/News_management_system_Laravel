<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('dashboard', function () {
    return view('pages.dashboard');
})->name('dashboard');

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');

