
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\GuestPersilController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\DokumenPersilController;
use App\Http\Controllers\PetaPersilController;
use App\Http\Controllers\JenisPenggunaanController;
use App\Http\Controllers\SengketaPersilController;

// Routes Persil - memerlukan authentication
Route::prefix('persil')->name('pages.persil.')->middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('/', [PersilController::class, 'index'])->name('index');
    Route::get('/create', [PersilController::class, 'create'])->name('create');
    Route::post('/', [PersilController::class, 'store'])->name('store');
    Route::get('/{persil}', [PersilController::class, 'show'])->name('show');

    // Edit, Update, Delete - hanya untuk operator (CRUD penuh)
    Route::middleware('role:operator')->group(function () {
        Route::get('/{persil}/edit', [PersilController::class, 'edit'])->name('edit');
        Route::put('/{persil}', [PersilController::class, 'update'])->name('update');
        Route::delete('/{persil}', [PersilController::class, 'destroy'])->name('destroy');
        Route::delete('/media/{media}', [PersilController::class, 'deleteMedia'])->name('media.delete');
    });
});

// Routes Dokumen Persil - memerlukan authentication
Route::prefix('dokumen-persil')->name('pages.dokumen-persil.')->middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('/', [DokumenPersilController::class, 'index'])->name('index');
    Route::get('/create', [DokumenPersilController::class, 'create'])->name('create');
    Route::post('/', [DokumenPersilController::class, 'store'])->name('store');
    Route::get('/{dokumen}', [DokumenPersilController::class, 'show'])->name('show');

    // Edit, Update, Delete - hanya untuk operator (CRUD penuh)
    Route::middleware('role:operator')->group(function () {
        Route::get('/{dokumen}/edit', [DokumenPersilController::class, 'edit'])->name('edit');
        Route::put('/{dokumen}', [DokumenPersilController::class, 'update'])->name('update');
        Route::delete('/{dokumen}', [DokumenPersilController::class, 'destroy'])->name('destroy');
        Route::delete('/media/{media}', [DokumenPersilController::class, 'deleteMedia'])->name('media.delete');
    });
});

// Routes Peta Persil - memerlukan authentication
Route::prefix('peta-persil')->name('pages.peta-persil.')->middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('/', [PetaPersilController::class, 'index'])->name('index');
    Route::get('/create', [PetaPersilController::class, 'create'])->name('create');
    Route::post('/', [PetaPersilController::class, 'store'])->name('store');
    Route::get('/{peta}', [PetaPersilController::class, 'show'])->name('show');

    // Edit, Update, Delete - hanya untuk operator (CRUD penuh)
    Route::middleware('role:operator')->group(function () {
        Route::get('/{peta}/edit', [PetaPersilController::class, 'edit'])->name('edit');
        Route::put('/{peta}', [PetaPersilController::class, 'update'])->name('update');
        Route::delete('/{peta}', [PetaPersilController::class, 'destroy'])->name('destroy');
    });
});

// API untuk mendapatkan data peta GeoJSON
Route::get('/api/peta-persil', [PetaPersilController::class, 'apiGetPetas'])->name('api.peta-persil');

// Routes Sengketa Persil - memerlukan authentication
Route::prefix('sengketa-persil')->name('pages.sengketa-persil.')->middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('/', [SengketaPersilController::class, 'index'])->name('index');
    Route::get('/create', [SengketaPersilController::class, 'create'])->name('create');
    Route::post('/', [SengketaPersilController::class, 'store'])->name('store');
    Route::get('/{sengketa}', [SengketaPersilController::class, 'show'])->name('show');

    // Edit, Update, Delete - hanya untuk operator (CRUD penuh)
    Route::middleware('role:operator')->group(function () {
        Route::get('/{sengketa}/edit', [SengketaPersilController::class, 'edit'])->name('edit');
        Route::put('/{sengketa}', [SengketaPersilController::class, 'update'])->name('update');
        Route::delete('/{sengketa}', [SengketaPersilController::class, 'destroy'])->name('destroy');
        Route::delete('/media/{media}', [SengketaPersilController::class, 'deleteMedia'])->name('media.delete');
    });
});

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
// Registration & user management
Route::get('/auth/register', [AuthController::class, 'registerForm'])->name('pages.auth.register');
Route::post('/auth/register', [AuthController::class, 'register'])->name('pages.auth.register.store');

// Profile - untuk user yang login (edit profil sendiri)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [AuthController::class, 'profile'])->name('profile');
    Route::put('/profile', [AuthController::class, 'updateProfile'])->name('profile.update');
});

// User management - hanya untuk operator
Route::middleware(['auth', 'role:operator'])->group(function () {
    Route::get('/auth/users', [AuthController::class, 'users'])->name('pages.auth.users');
    Route::get('/auth/users/{id}/edit', [AuthController::class, 'edit'])->name('pages.auth.users.edit');
    Route::put('/auth/users/{id}', [AuthController::class, 'update'])->name('pages.auth.users.update');
    Route::delete('/auth/users/{id}', [AuthController::class, 'destroy'])->name('pages.auth.users.destroy');
});

Route::get('home', [IndexController::class, 'index'])->name('index');

// Jenis Penggunaan CRUD - memerlukan authentication
Route::middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('jenis-penggunaan', [JenisPenggunaanController::class, 'index'])->name('pages.jenis-penggunaan.index');
    Route::get('jenis-penggunaan/create', [JenisPenggunaanController::class, 'create'])->name('pages.jenis-penggunaan.create');
    Route::post('jenis-penggunaan', [JenisPenggunaanController::class, 'store'])->name('pages.jenis-penggunaan.store');

    // Edit, Update, Delete - hanya untuk operator
    Route::middleware('role:operator')->group(function () {
        Route::get('jenis-penggunaan/{id}/edit', [JenisPenggunaanController::class, 'edit'])->name('pages.jenis-penggunaan.edit');
        Route::put('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'update'])->name('pages.jenis-penggunaan.update');
        Route::delete('jenis-penggunaan/{id}', [JenisPenggunaanController::class, 'destroy'])->name('pages.jenis-penggunaan.destroy');
    });
});
Route::get('/about', function () {
    return view('pages.guest.about');
})->name('pages.guest.about');

// Routes Warga - memerlukan authentication
Route::prefix('warga')->name('pages.warga.')->middleware('auth')->group(function () {
    // View & Create - dapat diakses oleh operator dan warga
    Route::get('/', [WargaController::class, 'index'])->name('index');
    Route::get('/create', [WargaController::class, 'create'])->name('create');
    Route::post('/', [WargaController::class, 'store'])->name('store');
    Route::get('/{warga}', [WargaController::class, 'show'])->name('show');

    // Edit, Update, Delete - hanya untuk operator (CRUD penuh)
    Route::middleware('role:operator')->group(function () {
        Route::get('/{warga}/edit', [WargaController::class, 'edit'])->name('edit');
        Route::put('/{warga}', [WargaController::class, 'update'])->name('update');
        Route::delete('/{warga}', [WargaController::class, 'destroy'])->name('destroy');
    });
});
