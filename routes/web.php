<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestPersilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persil', [GuestPersilController::class, 'index']);

Route::get('/auth', [AuthController::class, 'index'])->name('auth.index'); // tampilkan form login

Route::post('/auth/login', [AuthController::class, 'login'])->name('auth.login'); // proses login pakai function login()
