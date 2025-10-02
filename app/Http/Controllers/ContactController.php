<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; // WAJIB: Untuk menggunakan fungsi pengiriman email
use App\Mail\ContactFormMail;      // WAJIB: Mengimpor class Mailable yang kita buat

class ContactController extends Controller
{
    /**
     * Memproses data yang dikirim dari formulir kontak dan mengirim email.
     */
    public function send(Request $request)
    {
        // 1. Validasi Data
        // Kita simpan hasil validasi ke dalam variabel $validatedData
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email',
            'subjek' => 'required|max:255',
            'pesan' => 'required|min:10',
        ]);

        // 2. Mengirim Email
        try {
            // Menggunakan Mail::to() untuk mengirim email ke alamat Anda
            Mail::to('unimusardy@gmail.com') // GANTI dengan email yang Anda cek!
                ->send(new ContactFormMail($validatedData));

            // Jika pengiriman berhasil
            return redirect()->route('kontak.index')->with('success', 'Pesan Anda berhasil terkirim! Silakan cek kotak masuk email Anda.');
            
        } catch (\Exception $e) {
            // Jika terjadi error saat pengiriman email (misalnya, masalah konfigurasi .env)
            return redirect()->route('kontak.index')->with('error', 'Pesan gagal terkirim. Mohon cek konfigurasi email Anda.')->withInput();
        }
    }
}