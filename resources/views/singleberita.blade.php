@extends('layouts.app')

@section('title', $post['judul'])

@section('content')
    <div class="container" style="max-width: 800px; margin: 0 auto; padding-top: 20px;">
        
        <a href="{{ route('berita.index') }}" style="display: block; margin-bottom: 20px; color: #007bff; text-decoration: none;">&larr; Kembali ke Daftar Berita</a>
        
        <h1 style="margin-bottom: 10px; color: #333;">{{ $post['judul'] }}</h1>
        <p style="font-size: 0.9em; color: #777; border-bottom: 1px solid #eee; padding-bottom: 10px;">
            Ditulis oleh {{ $post['penulis'] }}
        </p>

        <div style="line-height: 1.8; margin-top: 20px; color: #444; text-align: left;">
            {{-- Tampilkan isi konten --}}
            <p>{{ $post['konten'] }}</p> 
        </div>
        
    </div>
@endsection