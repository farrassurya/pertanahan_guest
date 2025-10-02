<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestPersilController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/persil', [GuestPersilController::class, 'index']);
