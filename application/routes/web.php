<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    
    return view('pages.backend.welcome');
})->name('welcome');

Route::get('login',[LoginController::class,'login'])->name('login');
Route::post('login', [LoginController::class, 'store'])->name('login.store');


Route::group(['namespace'=>'Backend','prefix'=>'company-backend','middleware'=>'auth'], function(){
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::get('logout',[LoginController::class,'logout'])->name('logout');
    Route::group(['prefix'=>'users'], function(){
        Route::any('account-setting',[UserController::class,'account'])->name('account');
        Route::any('update-user-status',[UserController::class,'status'])->name('update-user-status');
        Route::any('users-list',[UserController::class,'index'])->name('account.index');
        Route::any('delete-users/{id}',[UserController::class,'delete'])->name('delete-users');
    });
    Route::resource('manage-category','\App\Http\Controllers\Backend\CategoryController');
});
