<?php

use App\Http\Controllers\AlumniController;
use App\Http\Controllers\AlumniLengkapController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

// Tampilan Halaman Login
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses Login Manual
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        return redirect()->intended('/');
    }
    return back()->withErrors(['email' => 'Email atau Password salah!']);
})->name('login.post');

// Proses Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

// SEMUA TUGAS DI DALAM MIDDLEWARE (TERKUNCI)
Route::middleware(['auth'])->group(function () {
    Route::get('/', [AlumniController::class, 'index'])->name('alumni.index');
    Route::post('/store', [AlumniController::class, 'store'])->name('alumni.store');
    Route::post('/track/{id}', [AlumniController::class, 'track'])->name('alumni.track');
    Route::delete('/alumni/{id}', [AlumniController::class, 'destroy'])->name('alumni.destroy');

    Route::get('/alumni-2000', [AlumniLengkapController::class, 'index'])->name('alumni_lengkap.index');
    Route::post('/alumni-2000/store', [AlumniLengkapController::class, 'store'])->name('alumni_lengkap.store');
});