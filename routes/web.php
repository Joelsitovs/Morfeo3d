<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\Morfeo3dController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FileUploadController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


// Ruta principal
Route::get('/', [Morfeo3dController::class, 'index'])->name('morfeo3d.index');
;

// Ruta del dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // // Rutas para Chirps
    // Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');
    // Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
    // Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
    // Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
    // Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');
});

require __DIR__ . '/auth.php';
Route::get('/chirps', [ChirpController::class, 'index'])->name('chirps.index');
Route::post('/chirps', [ChirpController::class, 'store'])->name('chirps.store');
Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit'])->name('chirps.edit');
Route::put('/chirps/{chirp}', [ChirpController::class, 'update'])->name('chirps.update');
Route::delete('/chirps/{chirp}', [ChirpController::class, 'destroy'])->name('chirps.destroy');

Route::post('upload',[FileUploadController::class,'upload'])->name('file.upload');

Route::get ('/canvas', function () {
    return view('morfeo3d.canvas');
});