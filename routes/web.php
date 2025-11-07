<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuestPersilController;

Route::get('/', function () {
    return view('guest.home');
})->name('guest.home');

Route::get('/persil', [GuestPersilController::class, 'index']);
// Route::get('/about', [GuestPersilController::class, 'about']);

// Guest pages
Route::get('/services', function () {
    return view('guest.services');
})->name('guest.services');

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index'); // tampilkan form login

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); // proses login pakai function login()

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Registration & user management (guest sign up + CRUD)
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register.store');
Route::get('/auth/users', [AuthController::class, 'users'])->name('auth.users');
Route::get('/auth/users/{id}/edit', [AuthController::class, 'edit'])->name('auth.users.edit');
Route::put('/auth/users/{id}', [AuthController::class, 'update'])->name('auth.users.update');
Route::delete('/auth/users/{id}', [AuthController::class, 'destroy'])->name('auth.users.destroy');

Route::get('home', [IndexController::class, 'index'])->name('index');

// Jenis Penggunaan CRUD (guest form posts to store; management pages available at /jenis-penggunaan)
use App\Http\Controllers\JenisPenggunaanController;
Route::get('jenis-penggunaan', [JenisPenggunaanController::class, 'index'])->name('jenis-penggunaan.index');
Route::get('jenis-penggunaan/create', [JenisPenggunaanController::class, 'create'])->name('jenis-penggunaan.create');
Route::post('jenis-penggunaan', [JenisPenggunaanController::class, 'store'])->name('jenis-penggunaan.store');
Route::get('jenis-penggunaan/{id}/edit', [JenisPenggunaanController::class, 'edit'])->name('jenis-penggunaan.edit');
Route::put('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'update'])->name('jenis-penggunaan.update');
Route::delete('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'destroy'])->name('jenis-penggunaan.destroy');
Route::get('/about', function () {
    return view('guest.about');
})->name('guest.about');
