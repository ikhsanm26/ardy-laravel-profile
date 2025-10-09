<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController; // WAJIB ada di sini

// --- Data Berita (Didefinisikan di sini agar bisa diakses di route manapun) ---
$berita_data = [
    [
        'judul' => 'Unimus mart laris manis',
        'slug' => 'unimus-mart-laris-manis',
        "penulis" => "Ardy Iksan",
        "konten" => "Unimus Mart yang terletak di Universitas Muhammadiyah Semarang (Unimus) semakin hari semakin laris manis. Hal ini dikarenakan Unimus Mart menyediakan berbagai kebutuhan mahasiswa dengan harga yang terjangkau. Selain itu, Unimus Mart juga sering mengadakan promo-promo menarik yang membuat mahasiswa semakin tertarik untuk berbelanja di sana."
    ],
    [
        'judul' => 'Berita unimus kedua',
        "slug" => "berita-unimus-kedua",
        "penulis" => "Ardy Iksan",
        "konten" => "Berita kedua tentang Unimus yang tidak kalah menarik adalah tentang prestasi yang diraih oleh mahasiswa Unimus di berbagai bidang. Mahasiswa Unimus telah berhasil meraih berbagai penghargaan baik di tingkat nasional maupun internasional. Hal ini menunjukkan bahwa Unimus tidak hanya fokus pada pendidikan akademik, tetapi juga mendukung pengembangan bakat dan minat mahasiswa di berbagai bidang."
    ],
    [
        'judul' => 'Berita Ketiga',
        'slug' => 'berita-ketiga', // Ditambahkan slug agar bisa dicari
        "penulis" => "Ardy Iksan",
        'konten' => 'Ini adalah isi dari berita ketiga.'
    ]
];
// ------------------------------------------


// Halaman Utama
Route::get('/', function () {
    // Menggunakan view 'home' yang lebih rapi (asumsi sudah diganti namanya)
    return view('home'); 
})->name('home');

// Halaman Profil (Mengirim data)
Route::get('/profil', function () {
    return view('profil', [
        'nama' => 'Ardy Iksan',
        'nohp' => '081392982466',
        'foto' => 'img/Ardyfoto.jpg'
    ]);
});

// Halaman Kontak (Tampilan Formulir)
Route::get('/kontak', function () {
    return view('kontak');
})->name('kontak.index'); 

// --- FITUR BERITA (DIGANTI SELURUHNYA) ---

// 1. Route Daftar Berita (Menampilkan semua data, menggantikan kode error Anda)
Route::get('/berita', function () use ($berita_data) {
    return view('berita', [
        'title' => 'Daftar Berita',
        'posts' => $berita_data // Mengirim semua data berita
    ]);
})->name('berita.index');

// 2. Route Detail Berita (Wajib ditambahkan untuk melihat satu berita)
// {slug} di URL ini akan mencari data yang cocok
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
    
    // Jika berita tidak ditemukan
    if (empty($single_berita)) {
        abort(404);
    }
    
    return view('singleberita', [
        'title' => $single_berita['judul'],
        "post" => $single_berita // Menggunakan 'post' agar lebih mudah di view
    ]);
})->name('berita.single');


// Menerima data dari formulir kontak
Route::post('/kontak', [ContactController::class, 'send'])->name('kontak.send');