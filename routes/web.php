<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MahasiswaController; // <--- TAMBAHAN 1: Import Controller Mahasiswa

// --- Data Berita (Didefinisikan sekali agar bisa diakses semua route) ---
$berita_data = [
    [
        'judul' => 'Unimus mart laris manis',
        'slug' => 'unimus-mart-laris-manis',
        "penulis" => "Ardy Iksan",
        "konten" => "Unimus Mart yang terletak di Universitas Muhammadiyah Semarang (Unimus) semakin hari semakin laris manis. Hal ini dikarenakan Unimus Mart menyediakan berbagai kebutuhan mahasiswa dengan harga yang terjangkau. Selain itu, Unimus Mart juga sering mengadakan promo-promo menarik yang membuat mahasiswa semakin tertarik untuk berbelanja di sana."
    ],
    [
        'judul' => 'Unimus Unggul',
        "slug" => "Unimus-Unggul",
        "penulis" => "maulana",
        "konten" => "Berita kedua tentang Unimus yang tidak kalah menarik adalah tentang prestasi yang diraih oleh mahasiswa Unimus di berbagai bidang. Mahasiswa Unimus telah berhasil meraih berbagai penghargaan baik di tingkat nasional maupun internasional. Hal ini menunjukkan bahwa Unimus tidak hanya fokus pada pendidikan akademik, tetapi juga mendukung pengembangan bakat dan minat mahasiswa di berbagai bidang."
    ],
    [
        'judul' => 'Berita Ketiga',
        'slug' => 'berita-ketiga',
        "penulis" => "Ardy Iksan",
        'konten' => 'Ini adalah isi dari berita ketiga.'
    ]
];
// ------------------------------------------


// Halaman Utama
Route::get('/', function () {
    return view('home');
})->name('home');

// Halaman Profil
Route::get('/profil', function () {
    return view('profil', [
        'nama' => 'Ardy Ikhsan Maulana',
        'nohp' => '081392982466',
        'foto' => 'img/Ardyfoto.jpg'
    ]);
});

// Halaman Kontak
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index');


// ----------------------------------------------------
// FITUR BERITA (SUDAH DIPERBAIKI)
// ----------------------------------------------------

// 1. Route DAFTAR BERITA (/berita)
Route::get('/berita', function () use ($berita_data) {
    return view('berita', [
        'title' => 'Daftar Berita',
        'posts' => $berita_data // Mengirim semua data
    ]);
})->name('berita.index');

// 2. Route DETAIL BERITA (/berita/{slug})
Route::get('/berita/{slug}', function ($slug) use ($berita_data) {
    
    $single_berita = [];
    foreach($berita_data as $berita)
    {
        if($berita['slug'] === $slug)
        {
            $single_berita = $berita;
            break;
        }
    }
    
    // Jika berita tidak ditemukan (misal, URL salah)
    if (empty($single_berita)) {
        abort(404);
    }
    
    return view('singleberita', [
        'title' => $single_berita['judul'],
        "post" => $single_berita // Variabel yang dikirim adalah $post
    ]);
})->name('berita.single');
// ----------------------------------------------------


// Menerima data dari formulir kontak
Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.send');


// ----------------------------------------------------
// TAMBAHAN 2: Route CRUD Mahasiswa
// ----------------------------------------------------
// Ini otomatis membuat jalur untuk:
// - index (daftar) -> /mahasiswa
// - create (form tambah) -> /mahasiswa/create
// - store (simpan data) -> POST /mahasiswa
// - edit (form edit) -> /mahasiswa/{id}/edit
// - update (update data) -> PUT /mahasiswa/{id}
// - destroy (hapus data) -> DELETE /mahasiswa/{id}
Route::resource('mahasiswa', MahasiswaController::class);