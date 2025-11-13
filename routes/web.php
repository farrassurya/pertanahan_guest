<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuestPersilController;
use App\Http\Controllers\WargaController;

Route::get('/', function () {
    return view('pages.guest.home');
})->name('pages.guest.home');

// Route::get('/persil', [GuestPersilController::class, 'index']);
// Route::get('/about', [GuestPersilController::class, 'about']);

// Guest pages
Route::get('/services', function () {
    return view('pages.guest.services');
})->name('pages.guest.services');

Route::get('/auth', [AuthController::class, 'index'])->name('pages.auth.index'); // tampilkan form login

Route::post('/auth/login', [AuthController::class, 'login'])->name('pages.auth.login'); // proses login pakai function login()

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// Registration & user management (guest sign up + CRUD)
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('pages.auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('pages.auth.register.store');
Route::get('/auth/users', [AuthController::class, 'users'])->name('pages.auth.users');
Route::get('/auth/users/{id}/edit', [AuthController::class, 'edit'])->name('pages.auth.users.edit');
Route::put('/auth/users/{id}', [AuthController::class, 'update'])->name('pages.auth.users.update');
Route::delete('/auth/users/{id}', [AuthController::class, 'destroy'])->name('pages.auth.users.destroy');

Route::get('home', [IndexController::class, 'index'])->name('index');

// Jenis Penggunaan CRUD (guest form posts to store; management pages available at /jenis-penggunaan)
use App\Http\Controllers\JenisPenggunaanController;
Route::get('jenis-penggunaan', [JenisPenggunaanController::class, 'index'])->name('pages.jenis-penggunaan.index');
Route::get('jenis-penggunaan/create', [JenisPenggunaanController::class, 'create'])->name('pages.jenis-penggunaan.create');
Route::post('jenis-penggunaan', [JenisPenggunaanController::class, 'store'])->name('pages.jenis-penggunaan.store');
Route::get('jenis-penggunaan/{id}/edit', [JenisPenggunaanController::class, 'edit'])->name('pages.jenis-penggunaan.edit');
Route::put('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'update'])->name('pages.jenis-penggunaan.update');
Route::delete('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'destroy'])->name('pages.jenis-penggunaan.destroy');
Route::get('/about', function () {
    return view('pages.guest.about');
})->name('pages.guest.about');

// Routes Warga - bisa diakses tanpa login
Route::prefix('warga')->name('pages.warga.')->group(function () {
    Route::get('/', [WargaController::class, 'index'])->name('index');
    Route::get('/create', [WargaController::class, 'create'])->name('create');
    Route::post('/', [WargaController::class, 'store'])->name('store');
    Route::get('/{warga}', [WargaController::class, 'show'])->name('show');
    Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('edit');
    Route::put('/{warga}', [WargaController::class, 'update'])->name('update');
    Route::delete('/{warga}', [WargaController::class, 'destroy'])->name('destroy');
});
