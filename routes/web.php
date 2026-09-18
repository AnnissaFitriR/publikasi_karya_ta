<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KaryaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\HomeController;

// Mahasiswa
Route::get('/register', [MahasiswaController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [MahasiswaController::class, 'register'])
    ->name('mahasiswa.register');

Route::get('/login', [MahasiswaController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [MahasiswaController::class, 'login'])
    ->name('mahasiswa.login');

Route::get('/mahasiswa/dashboard', function () {
    return view('mahasiswa.dashboard');
})->middleware('auth')->name('mahasiswa.dashboard');

Route::post('/logout', [MahasiswaController::class, 'logout'])
    ->name('logout');

Route::get('/mahasiswa/karya', [KaryaController::class, 'index'])
    ->middleware('auth')
    ->name('mahasiswa.karya.index');

Route::get('/mahasiswa/karya/tambah', [KaryaController::class, 'create'])
    ->middleware('auth')
    ->name('mahasiswa.karya.create');

Route::post('/mahasiswa/karya', [KaryaController::class, 'store'])
    ->middleware('auth')
    ->name('mahasiswa.karya.store');

Route::get('/mahasiswa/karya/{id}/edit', [KaryaController::class, 'edit'])
    ->middleware('auth')
    ->name('mahasiswa.karya.edit');

Route::put('/mahasiswa/karya/{id}', [KaryaController::class, 'update'])
    ->middleware('auth')
    ->name('mahasiswa.karya.update');

Route::delete('/mahasiswa/karya/{id}', [KaryaController::class, 'destroy'])
    ->middleware('auth')
    ->name('mahasiswa.karya.destroy');

Route::get('/mahasiswa/profile', [MahasiswaController::class, 'profile'])
    ->middleware('auth')
    ->name('mahasiswa.profile');

Route::put('/mahasiswa/profile', [MahasiswaController::class, 'updateProfile'])
    ->middleware('auth')
    ->name('mahasiswa.profile.update');

// Admin
Route::get('/admin/login', [AdminController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminController::class, 'login'])
    ->name('admin.login.process');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->middleware('auth:admin')
    ->name('admin.dashboard');

Route::post('/admin/logout', [AdminController::class, 'logout'])
    ->middleware('auth:admin')
    ->name('admin.logout');

Route::get('/admin/karya', [AdminController::class, 'karya'])
    ->middleware('auth:admin')
    ->name('admin.karya.index');

Route::get('/admin/karya/{id}', [AdminController::class, 'detailKarya'])
    ->middleware('auth:admin')
    ->name('admin.karya.detail');

Route::post('/admin/karya/{id}/setujui', [AdminController::class, 'setujuiKarya'])
    ->middleware('auth:admin')
    ->name('admin.karya.setujui');

Route::post('/admin/karya/{id}/tolak', [AdminController::class, 'tolakKarya'])
    ->middleware('auth:admin')
    ->name('admin.karya.tolak');

// Admin - Kategori
Route::get('/admin/kategori', [KategoriController::class, 'index'])
    ->middleware('auth:admin')
    ->name('admin.kategori.index');

Route::post('/admin/kategori', [KategoriController::class, 'store'])
    ->middleware('auth:admin')
    ->name('admin.kategori.store');

Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])
    ->middleware('auth:admin')
    ->name('admin.kategori.edit');

Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])
    ->middleware('auth:admin')
    ->name('admin.kategori.update');

Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])
    ->middleware('auth:admin')
    ->name('admin.kategori.destroy');

// Home
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/karya', [HomeController::class, 'semuaKarya'])
    ->name('pengunjung.karya.index');

Route::get('/karya/{id}', [HomeController::class, 'detailKarya'])
    ->name('pengunjung.karya.detail');

Route::get('/kategori/{id}', [HomeController::class, 'kategori'])
    ->name('pengunjung.karya.kategori');
