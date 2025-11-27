@extends('layouts.app')

@section('title', 'Selamat Datang di Profil Ardy')

@section('content')
    <style>
        /* CSS Khusus untuk Home Page */
        .home-container {
            padding: 40px 20px;
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .home-container h2 {
            color: #007bff;
            margin-bottom: 5px;
            font-size: 1.5em;
        }
        .home-container h1 {
            font-size: 2.8em;
            color: #333;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .home-container p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
            margin-bottom: 25px;
        }
        .cta-button {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 30px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }
        .cta-button:hover {
            background-color: #0056b3;
        }
        .skill-list {
            list-style: none;
            padding: 0;
            margin-top: 30px;
        }
        .skill-list li {
            display: inline-block;
            background-color: #e9ecef;
            color: #495057;
            padding: 8px 15px;
            margin: 5px;
            border-radius: 5px;
            font-weight: 600;
        }
        /* Style untuk membuat kartu putih di Home, sama seperti Kontak/Berita */
        .home-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            margin-top: 50px;
        }
    </style>
    
    <div class="container home-card">
        <div class="home-container">
            <h2>Halo! Selamat Datang di Dunia Digital Saya</h2>
            <h1>Ardy Ikhsan Maulana</h1>
            
            <p>
                Saya adalah seorang mahasiswa dengan semangat tinggi dalam Belajar hal baru untuk mengembangkan kemampuan saya. Di sini, Anda dapat menemukan informasi lebih detail tentang saya dan kemampuan saya.
            </p>
            
            <a href="{{ url('/profil') }}" class="cta-button">Lihat Profil Lengkap Saya</a>
            
            <ul class="skill-list">
                <li>PHP</li>
                <li>Desain Grafis</li>
                <li>HTML & CSS</li>
                <li>Database (MySQL)</li>
                <li>Git & GitHub</li>
            </ul>
            
            <p style="margin-top: 40px;">
                Tertarik untuk berdiskusi atau berkolaborasi?
                Kunjungi <a href="{{ route('kontak.index') }}" style="color: #007bff; font-weight: bold;">Halaman Kontak</a> saya.
            </p>
        </div>
    </div>
@endsection