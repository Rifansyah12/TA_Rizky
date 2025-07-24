<?php

use App\Http\Controllers\EkstrakulikulerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    });
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/pendaftaran', function () {
    return view('pendaftaran.index');
})->name('pendaftaran.index');



Route::get('/profil', [ProfileController::class, 'index'])->name('profil');
Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi');
Route::get('/ekstrakulikuler', [EkstrakulikulerController::class, 'index'])->name('ekstrakulikuler');