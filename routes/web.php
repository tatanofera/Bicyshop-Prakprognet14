<?php

use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('welcome');
// });

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Auth::routes(['verify' => true]); //verifikasi email

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('landing')->middleware('verified');
Route::get('/profile', [App\Http\Controllers\User\ProfileController::class, 'profile'])->name('userprofile');

Route::get('/admin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'loginAdmin'])->name('loginadmin');
Route::post('actionlogin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'action'])->name('actionlogin');
Route::get('logoutAdmin', [App\Http\Controllers\Admin\LoginControllerAdmin::class, 'logoutAdmin'])->name('logoutadmin');
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'dashboard'])->name ('dashboard');
}); 
