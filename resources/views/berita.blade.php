@extends('layouts.app')

@section('title', 'Daftar Berita Terbaru')

@section('content')
    <div class="container" style="max-width: 800px; text-align: left;">
        <h1 style="text-align: center; margin-bottom: 20px; border-bottom: 2px solid #007bff; padding-bottom: 5px;">Daftar Berita Unimus</h1>
        
        {{-- Loop untuk menampilkan setiap item berita --}}
        @forelse ($posts as $post)
            <div style="border: 1px solid #ccc; padding: 15px; margin-bottom: 15px; border-radius: 8px;">
                <h2 style="color: #333; margin-top: 0; margin-bottom: 5px;">{{ $post['judul'] }}</h2>
                <p style="font-size: 0.9em; color: #777;">Ditulis oleh {{ $post['penulis'] }}</p>
                
                {{-- Link untuk melihat detail (menggunakan 'slug') --}}
                <a href="{{ route('berita.single', $post['slug']) }}" style="color: #007bff; text-decoration: none; font-weight: bold;">Baca Selengkapnya</a>
            </div>
        @empty
            <p style="text-align: center; color: #777;">Belum ada berita yang tersedia saat ini.</p>
        @endforelse
    </div>
@endsection