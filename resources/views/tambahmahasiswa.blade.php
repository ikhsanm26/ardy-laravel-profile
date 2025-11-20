@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;"> <div class="card shadow">
        <div class="card-body">
            <h3 class="text-center mb-4">Tambah Data Mahasiswa</h3>
            
            <form action="{{ route('mahasiswa.store') }}" method="POST">
                @csrf <div class="mb-3">
                    <label class="form-label fw-bold">NIM</label>
                    <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" placeholder="Masukkan Jurusan">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal / Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection