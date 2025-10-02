<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController; // WAJIB ada di sini

// Halaman Utama
Route::get('/', function () {
    return view('welcome');
});

// Halaman Profil
Route::get('/profil', function () {
    return view('profil');
});

// Halaman Kontak (Tampilan Formulir)
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index'); 


// Menerima data dari formulir kontak
Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.send');