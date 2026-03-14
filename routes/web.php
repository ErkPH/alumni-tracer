<?php

use App\Http\Controllers\AlumniController;
use Illuminate\Support\Facades\Route;

// Halaman utama: Menampilkan daftar alumni dan form input (Aktor: Admin)
Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');

// Route untuk menyimpan data alumni baru secara manual (Aktor: Admin)
Route::post('/store', [AlumniController::class, 'store'])->name('alumni.store');

// Route untuk menjalankan proses pelacakan otomatis (Aktor: Sistem/Scheduler)
Route::post('/track/{id}', [AlumniController::class, 'track'])->name('alumni.track');

Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');