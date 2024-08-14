<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');


Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');

