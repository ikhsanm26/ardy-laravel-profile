@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-body">
            <h3 class="text-center mb-4">Edit Data Mahasiswa</h3>
            
            {{-- Form update mengarah ke route update --}}
            <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
                @csrf
                @method('PUT') {{-- Method PUT wajib untuk update data --}}
                
                <div class="mb-3">
                    <label class="form-label fw-bold">NIM</label>
                    <input type="text" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" placeholder="Masukkan NIM">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Nama Lengkap</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" placeholder="Masukkan Nama Lengkap">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="{{ old('jurusan', $mahasiswa->jurusan) }}" placeholder="Masukkan Jurusan">
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success">Update Data</button>
                    <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection