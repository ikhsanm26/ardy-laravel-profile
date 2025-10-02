<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak Saya</title>
    <style>
        /* CSS Umum */
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 30px;
            text-align: center;
        }
        h1 {
            color: #333;
            margin-bottom: 25px;
            border-bottom: 2px solid #007bff;
            display: inline-block;
            padding-bottom: 5px;
        }

        /* CSS untuk Form Kontak */
        .form-group {
            margin-bottom: 15px;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
            font-weight: bold;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box; /* Penting agar padding tidak menambah lebar */
        }
        textarea.form-control {
            resize: vertical;
        }
        .btn-submit {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.1em;
            margin-top: 10px;
            transition: background-color 0.3s;
        }
        .btn-submit:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    @include('components.navbar') <div class="container">
        <h1>Kirim Pesan</h1>
        
        <form action="#" method="POST">
            {{-- Bagian penting Laravel: Token CSRF untuk keamanan --}}
            @csrf 
            
            <div class="form-group">
                <label for="nama">Nama Anda</label>
                <input type="text" id="nama" name="nama" class="form-control" required placeholder="Masukkan nama lengkap">
            </div>

            <div class="form-group">
                <label for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="form-control" required placeholder="contoh@email.com">
            </div>

            <div class="form-group">
                <label for="subjek">Subjek</label>
                <input type="text" id="subjek" name="subjek" class="form-control" required placeholder="Tujuan pesan Anda">
            </div>

            <div class="form-group">
                <label for="pesan">Pesan Anda</label>
                <textarea id="pesan" name="pesan" rows="5" class="form-control" required placeholder="Tulis pesan Anda di sini..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Kirim Pesan</button>
        </form>

        <p style="margin-top: 25px; color: #777; font-size: 0.9em;">
            Saya akan merespon pesan Anda secepatnya!
        </p>
        
        </div>
</body>
</html>