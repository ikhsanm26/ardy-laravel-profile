<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; // Pastikan model Mahasiswa di-import
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // 1. Menampilkan halaman daftar mahasiswa
    public function index()
    {
        // Mengambil semua data dari tabel mahasiswas
        $mahasiswa = Mahasiswa::all();
        
        // Mengirim data ke view 'mahasiswa/index.blade.php'
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    // 2. Menampilkan halaman form tambah data
    public function create()
    {
        // PENTING: Ini mengarah ke file 'resources/views/mahasiswa/tambahmahasiswa.blade.php'
        return view('mahasiswa.tambahmahasiswa');
    }

    // 3. Menyimpan data baru ke database
    public function store(Request $request)
    {
        // Validasi input agar tidak boleh kosong
        $request->validate([
            'nim'     => 'required|unique:mahasiswas,nim', // NIM harus unik
            'nama'    => 'required',
            'jurusan' => 'required',
        ]);

        // Simpan data ke database
        Mahasiswa::create($request->all());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa berhasil ditambahkan');
    }

    // 4. Menampilkan halaman form edit
    public function edit($id)
    {
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::findOrFail($id);
        
        // Kirim data ke view edit (kamu perlu buat file edit.blade.php nanti)
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    // 5. Mengupdate data di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nim'     => 'required',
            'nama'    => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($request->all());

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa berhasil diupdate');
    }

    // 6. Menghapus data
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')
                         ->with('success', 'Data Mahasiswa berhasil dihapus');
    }
}