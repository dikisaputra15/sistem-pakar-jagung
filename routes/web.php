<?php

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\GejalaController;
use App\Http\Controllers\Admin\PenyakitController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Admin\RuleController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Petani\DashboardController as PetaniDashboardController;
use App\Http\Controllers\Petani\DataLahanController;
use App\Http\Controllers\Petani\DiagnosaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

// ==== Auth ====
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
    Route::get('register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('register', [AuthController::class, 'register']);
});
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ==== Petani ====
Route::middleware(['auth', 'role:petani'])->prefix('petani')->name('petani.')->group(function () {
    Route::get('dashboard', [PetaniDashboardController::class, 'index'])->name('dashboard');

    Route::resource('lahan', DataLahanController::class)->except(['show']);

    Route::get('diagnosa', [DiagnosaController::class, 'create'])->name('diagnosa.create');
    Route::post('diagnosa', [DiagnosaController::class, 'store'])->name('diagnosa.store');
    Route::get('diagnosa/riwayat', [DiagnosaController::class, 'riwayat'])->name('diagnosa.riwayat');
    Route::get('diagnosa/{riwayat}/hasil', [DiagnosaController::class, 'hasil'])->name('diagnosa.hasil');
});

// ==== Admin ====
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    Route::resource('gejala', GejalaController::class)->except(['show']);
    Route::resource('penyakit', PenyakitController::class)->except(['show']);

    Route::get('rule', [RuleController::class, 'index'])->name('rule.index');
    Route::get('rule/{penyakit}/edit', [RuleController::class, 'edit'])->name('rule.edit');
    Route::put('rule/{penyakit}', [RuleController::class, 'update'])->name('rule.update');

    Route::get('riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    Route::get('riwayat/{riwayat}', [RiwayatController::class, 'show'])->name('riwayat.show');
});
