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
use App\Http\Controllers\UserController;

Route::prefix('admin-dashboard')->group(function () {
    Route::resource('users', UserController::class, ['as' => 'admin']);
}); 
Route::put('/admin-dashboard/users/{user}', [UserController::class, 'update'])->name('admin.users.edit');
Route::get('/admin-dashboard/users/{user}/edit', [UserController::class, 'edit']);
Route::get('/admin-dashboard/users/{id}', [UserController::class, 'show'])->name('admin.users.show');


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

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');

Route::get('/admin-dashboard', [AuthController::class, 'dashboardadmin'])->name('dashoardadmin');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/loginadmin', [AuthController::class, 'adminLogin'])->name('adminlogin');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard/moodcafe', [CafeController::class, 'showMoodCafe'])->name('dashboard.moodcafe');
Route::get('/dashboard/agendacafe', [CafeController::class, 'showActivityCafe'])->name('dashboard.activities');




Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile.show');
Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');

