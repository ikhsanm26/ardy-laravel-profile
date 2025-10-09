<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    // Properti publik untuk menyimpan data dari formulir
    public $data;

    /**
     * Buat instance pesan baru.
     * Data formulir akan dilewatkan ke sini.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Bangun pesan.
     */
    public function build()
    {
        return $this->from($this->data['email'], $this->data['nama']) // Mengatur email pengirim (balasan)
                    ->subject('Pesan Baru: ' . $this->data['subjek']) // Subjek email
                    ->view('emails.contact'); // Menunjuk ke template Blade email
    }
}