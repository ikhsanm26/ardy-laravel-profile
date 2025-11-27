<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MahasiswaController; // Pastikan ini ada

// --- Data Berita (Biarkan saja seperti sebelumnya) ---
$berita_data = [
    [
        'judul' => 'Unimus mart laris manis',
        'slug' => 'unimus-mart-laris-manis',
        "penulis" => "Ardy Iksan",
        "konten" => "Unimus Mart yang terletak di Universitas Muhammadiyah Semarang (Unimus) semakin hari semakin laris manis."
    ],
    [
        'judul' => 'Unimus Unggul',
        "slug" => "Unimus-Unggul",
        "penulis" => "maulana",
        "konten" => "Berita kedua tentang Unimus yang tidak kalah menarik adalah tentang prestasi yang diraih oleh mahasiswa Unimus."
    ],
    [
        'judul' => 'Berita Ketiga',
        'slug' => 'berita-ketiga',
        "penulis" => "Ardy Iksan",
        'konten' => 'Ini adalah isi dari berita ketiga.'
    ]
];

// --- Halaman Umum ---
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/profil', function () {
    return view('profil', [
        'nama' => 'Ardy Ikhsan Maulana',
        'nohp' => '081392982466',
        'foto' => 'img/Ardyfoto.jpg'
    ]);
});

Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index');

Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.send');

// --- Fitur Berita ---
Route::get('/berita', function () use ($berita_data) {
    return view('berita', [
        'title' => 'Daftar Berita',
        'posts' => $berita_data
    ]);
})->name('berita.index');

Route::get('/berita/{slug}', function ($slug) use ($berita_data) {
    $single_berita = [];
    foreach($berita_data as $berita) {
        if($berita['slug'] === $slug) {
            $single_berita = $berita;
            break;
        }
    }
    if (empty($single_berita)) {
        abort(404);
    }
    return view('singleberita', [
        'title' => $single_berita['judul'],
        "post" => $single_berita
    ]);
})->name('berita.single');


// ====================================================
//  ROUTE MAHASISWA (MANUAL) - INI YANG PENTING
// ====================================================

// 1. Halaman Utama (Tabel)
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa');

// 2. Halaman Tambah (Form) -> INI YANG TADI ERROR (tambahmahasiswa)
Route::get('/tambahmahasiswa', [MahasiswaController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');

// 3. Proses Simpan Data
Route::post('/insertdata', [MahasiswaController::class, 'insertdata'])->name('insertdata');

// 4. Halaman Edit (Form)
Route::get('/tampildata/{id}', [MahasiswaController::class, 'tampildata'])->name('tampildata');

// 5. Proses Update Data
Route::post('/editdata/{id}', [MahasiswaController::class, 'editdata'])->name('editdata');

// 6. Proses Hapus Data
Route::get('/delete/{id}', [MahasiswaController::class, 'delete'])->name('delete');