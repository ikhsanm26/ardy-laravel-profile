@extends('layouts.app')

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

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold">Data Mahasiswa</h3>
                {{-- PERBAIKAN 1: Route ke form tambah manual --}}
                <a href="{{ route('tambahmahasiswa') }}" class="btn btn-primary">
                    + Tambah Data Mahasiswa
                </a>
            </div>

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
                            {{-- PERBAIKAN 2: Gunakan variabel $data (sesuai controller) --}}
                            {{-- Gunakan $row atau $mhs bebas, di sini saya pakai $row --}}
                            @forelse ($data as $row)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td>{{ $row->nim }}</td>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->jurusan }}</td>
                                <td class="text-center">
                                    
                                    {{-- PERBAIKAN 3: Tombol Edit arahkan ke route 'tampildata' --}}
                                    <a href="{{ route('tampildata', $row->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    {{-- PERBAIKAN 4: Tombol Hapus arahkan ke route 'delete' --}}
                                    {{-- Karena route delete kamu method-nya GET, cukup pakai link biasa + confirm --}}
                                    <a href="{{ route('delete', $row->id) }}" 
                                       class="btn btn-danger btn-sm" 
                                       onclick="return confirm('Yakin ingin menghapus data {{ $row->nama }}?');">
                                        Hapus
                                    </a>

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