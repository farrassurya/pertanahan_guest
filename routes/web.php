<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuestPersilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persil', [GuestPersilController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index'); // tampilkan form login

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); // proses login pakai function login()
// Registration & user management (guest sign up + CRUD)
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('auth.register.store');
Route::get('/auth/users', [AuthController::class, 'users'])->name('auth.users');
Route::get('/auth/users/{id}/edit', [AuthController::class, 'edit'])->name('auth.users.edit');
Route::put('/auth/users/{id}', [AuthController::class, 'update'])->name('auth.users.update');
Route::delete('/auth/users/{id}', [AuthController::class, 'destroy'])->name('auth.users.destroy');

Route::get('home', [IndexController::class, 'index'])->name('index');
Route::post('jenis-penggunaan', [IndexController::class, 'store'])->name('jenis-penggunaan.store');
Route::get('jenis-penggunaan', [IndexController::class, 'index'])->name('jenis-penggunaan.index');
