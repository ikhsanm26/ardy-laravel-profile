<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa; // Cukup satu kali saja di sini
use Illuminate\Http\Request;
// Baris kedua yang duplikat sudah dihapus

class MahasiswaController extends Controller
{
    // 1. MENAMPILKAN DATA (Index)
    public function index() {
        $data = Mahasiswa::all();
        return view('mahasiswa.index', compact('data'), [
            "title" => "Data Mahasiswa",
        ]);
    }

    // 2. FORM TAMBAH (tambahmahasiswa)
    public function tambahmahasiswa() {
        return view('mahasiswa.tambahmahasiswa', [
            "title" => "Tambah Data Mahasiswa",
        ]);
    }

    // 3. PROSES SIMPAN (insertdata)
    public function insertdata(Request $request)
    {
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'jurusan' => 'required',
        ]);

        Mahasiswa::create($request->except(['_token', 'submit']));

        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Tambahkan');
    }

    // 4. FORM EDIT (tampildata)
    public function tampildata($id)
    {
        $data = Mahasiswa::find($id);
        return view("mahasiswa.edit", [
            "title" => "Edit Data Mahasiswa",
            "data" => $data,
        ]);
    }

    // 5. PROSES UPDATE (editdata)
    public function editdata(Request $request, $id)
    {
        $data = Mahasiswa::find($id);
        
        $data->update($request->except(['_token', 'submit']));
        
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Di Update');
    }

    // 6. HAPUS DATA (delete)
    public function delete($id) {
        $data = Mahasiswa::find($id);
        $data->delete();
        return redirect()->route('mahasiswa')->with('success', 'Data Berhasil Dihapus');
    }
}