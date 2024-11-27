<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogindanRegister;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MoodController;


use App\Http\Controllers\AgendaController;
use App\Http\Controllers\CafeController;


Route::prefix('admin-dashboard')->group(function () {
    Route::resource('cafes', CafeController::class, ['as' => 'admin']);
});


Route::prefix('admin-dashboard')->group(function () {
    Route::resource('agendas', AgendaController::class, ['as' => 'admin']);
});



Route::prefix('admin-dashboard')->group(function () {
    Route::resource('moods', MoodController::class, ['as' => 'admin']);
});

Route::get('/admin-dashboard', [AuthController::class, 'dashboardadmin'])->name('dashoardadmin');


Route::get('/logout', [AuthController::class, 'logout1']);
Route::get('/login', [AuthController::class, 'index']);
Route::get('/register', [AuthController::class, 'indexregister']);
Route::get('/loginadmin', [AuthController::class, 'indexadminlogin']);
Route::get('/rekomendasi', [UsersController::class, 'indexRecommended'])->name('rekomendasi');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashoard');
Route::get('/admin-dashboard', [AuthController::class, 'dashboardadmin'])->name('dashoardadmin');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginadmin', [AuthController::class, 'adminLogin'])->name('adminlogin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
