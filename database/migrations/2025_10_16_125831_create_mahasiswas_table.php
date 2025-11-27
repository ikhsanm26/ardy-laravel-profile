<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            
            // PERBAIKAN: Sesuaikan nama kolom dengan Controller & View
            $table->string('nim')->unique(); // Kita pakai string biar aman kalau ada angka 0 di depan
            $table->string('nama');          // Ganti 'name' jadi 'nama'
            $table->string('jurusan');       // Ganti 'prodi' jadi 'jurusan'
            
            // Kolom email dihapus dulu karena di form tidak ada inputannya
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswas');
    }
};