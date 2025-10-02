<!DOCTYPE html>
<html>
<head>
    <title>Pesan Baru dari Formulir Kontak</title>
</head>
<body>
    <h2>Anda Menerima Pesan Baru</h2>
    <p><strong>Nama:</strong> {{ $data['nama'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Subjek:</strong> {{ $data['subjek'] }}</p>
    
    <hr>
    
    <h3>Isi Pesan:</h3>
    <p>{{ $data['pesan'] }}</p>
</body>
</html>