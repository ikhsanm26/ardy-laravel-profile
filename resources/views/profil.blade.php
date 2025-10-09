<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <style>
        /* CSS Navigasi Bar dari component akan otomatis muncul di sini */

        body {
            font-family: Arial, sans-serif;
            background: #3595f5ff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
        }
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
</head>
<body>
    
    {{-- BARIS PENTING: Memanggil Navigasi Bar --}}
    @include('components.navbar')
    
    <div class="container">
        <img src="{{ asset('images/Ardyfoto.jpg') }}" alt="Foto Profil" class="profile-pic">
        <h1>Ardy Ikhsan Maulana</h1>
        <p><strong>NIM:</strong> 13242420017</p>
        <p><strong>Email:</strong> unimusardy@gmail.com</p>
        <p><strong>Hobi:</strong> Olahraga & Traveling</p>
        <p><strong>No Telepon:</strong> 081392982466</p>
    </div>

    <div class="footer">
        <p>&copy; 2024 Ardy Iksan Maulana. Semua Hak Dilindungi.</p>
    </div>
</body>
</html>