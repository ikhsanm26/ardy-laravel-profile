@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Data Mahasiswa</h3>
                {{-- Tombol ini mengarah ke route create yang akan membuka file tambahmahasiswa.blade.php --}}
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    + Tambah Data Mahasiswa
                </a>
            </div>

            {{-- Menampilkan pesan sukses jika ada --}}
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <table class="table table-hover table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th width="5%" class="text-center">No</th>
                                <th>NIM</th>
                                <th>Nama Lengkap</th>
                                <th>Jurusan</th>
                                <th width="15%" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Looping data mahasiswa dari controller --}}
                            @forelse ($mahasiswa as $mhs)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->jurusan }}</td>
                                <td class="text-center">
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data {{ $mhs->nama }}?');">
                                        
                                        {{-- Tombol Edit --}}
                                        <a class="btn btn-warning btn-sm" href="{{ route('mahasiswa.edit', $mhs->id) }}">Edit</a>
                                        
                                        @csrf
                                        @method('DELETE')
                                        
                                        {{-- Tombol Hapus --}}
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    <em>Belum ada data mahasiswa. Silakan tambah data baru.</em>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection