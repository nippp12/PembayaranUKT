<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MahasiswaController;
use App\Http\Controllers\Admin\PembayaranController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\User\UserController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//routes user
Route::middleware(['userMiddleware'])->group(function () {
    Route::get('dashboard',[UserController::class,'index'])->name('dashboard');
    Route::get('riwayat',[RiwayatController::class,'index'])->name('riwayat');

    Route::get('form',[FormController::class,'index'])->name('form');
    Route::post('form',[FormController::class,'store'])->name('form.store');
});

//routes admin
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    Route::get('/admin/pembayaran',[PembayaranController::class,'index'])->name('admin.pembayaran');
    
    Route::get('/admin/mahasiswa', [MahasiswaController::class, 'index'])->name('admin.mahasiswa');
    Route::get('/admin/create', [MahasiswaController::class, 'create'])->name('admin.create');
    Route::post('/admin/mahasiswa', [MahasiswaController::class, 'store'])->name('admin.store');
    Route::get('/admin/edit/{nim}', [MahasiswaController::class, 'edit'])->name('admin.edit');
    Route::put('/admin/mahasiswa', [MahasiswaController::class, 'update'])->name('admin.update');
    Route::delete('/admin/mahasiswa', [MahasiswaController::class, 'destroy'])->name('admin.destroy');

    Route::post('/admin/status', [PembayaranController::class, 'updateStatus'])->name('admin.update.status');
});
