@extends('layouts.app')

@section('title', 'Profil Saya - ' . $nama)

@section('content')
    
    <style>
        /* CSS Unik untuk Latar Belakang Biru di halaman Profil */
        body { 
            /* Ini menimpa warna background global (body) dari layouts.app */
            background: #007bff; 
            background-color: #007bff !important; /* Gunakan !important untuk memaksa agar warna biru muncul */
        }
        
        /* CSS untuk Kartu Putih di tengah */
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white; /* Kartu putih */
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
        
        /* CSS untuk elemen di dalam kartu */
        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
            object-fit: cover;
            border: 3px solid #007bff;
        }
        h1 {
            color: #333;
            margin-bottom: 10px;
        }
        p {
            color: #555;
            margin: 6px 0;
        }
    </style>

    <div class="container">
        
        <img src="{{ asset('images/Ardyfoto.jpg') }}" alt="Foto Profil" class="profile-pic">
        
        <h1>{{ $nama }}</h1>
        
        <p><strong>NIM:</strong> 13242420017</p>
        <p><strong>Email:</strong> unimusardy@gmail.com</p>
        <p><strong>Hobi:</strong> Olahraga & Traveling</p>
        
        <p><strong>No Telepon:</strong> {{ $nohp }}</p>
        
    </div>
@endsection