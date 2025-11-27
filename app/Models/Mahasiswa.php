<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional jika sudah sesuai standar jamak 'mahasiswas')
    protected $table = 'mahasiswas';

    // SOLUSI ERROR: Tambahkan $fillable untuk mengizinkan kolom ini diisi data
    protected $fillable = [
        'nim',
        'nama',
        'jurusan'
    ];
}