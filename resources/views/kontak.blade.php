@extends('layouts.app')

@section('title', 'Hubungi Saya')

@section('content')
    <style>
        /* CSS KHUSUS FORM KONTAK */
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px; 
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        textarea.form-control {
            resize: vertical;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container">
        <h1>Kirim Pesan</h1>
        
        <form action="{{ route('kontak.send') }}" method="POST">
            @csrf 
            
            <div class="form-group">
                <label for="nama">Nama Anda</label>
                <input type="text" id="nama" name="nama" class="form-control" required placeholder="Masukkan nama lengkap" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="contoh@email.com" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="subjek">Subjek</label>
                <input type="text" id="subjek" name="subjek" class="form-control" required placeholder="Tujuan pesan Anda" value="{{ old('subjek') }}">
            </div>

            <div class="form-group">
                <label for="pesan">Pesan Anda</label>
                <textarea id="pesan" name="pesan" rows="5" class="form-control" required placeholder="Tulis pesan Anda di sini...">{{ old('pesan') }}</textarea>
            </div>

            <button type="submit" class="btn-submit">Kirim Pesan</button>
        </form>
    </div>
@endsection