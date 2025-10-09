<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Menerima judul unik dari setiap halaman --}}
    <title>@yield('title', 'Aplikasi Profil Laravel')</title>

    <style>
        /* CSS GLOBAL (Dari Profil, Kontak, dan Struktur Dasar) */
        body {
            font-family: Arial, sans-serif;
            background: #f8f9fa;
            margin: 0;
            padding: 0 0 70px 0; /* Jarak untuk Footer */
        }
        .container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            padding: 20px;
            text-align: center;
            min-height: 400px;
        }
        
        /* CSS NAVBAR */
        .navbar { background-color: #333; overflow: hidden; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); }
        .navbar a { float: left; display: block; color: #f2f2f2; text-align: center; padding: 14px 16px; text-decoration: none; font-size: 17px; }
        .navbar a:hover { background-color: #ddd; color: black; }
        .navbar a.active { background-color: #007bff; color: white; }
        
        /* CSS FOOTER */
        .footer { background-color: #333; color: #f2f2f2; text-align: center; padding: 15px 0; position: fixed; bottom: 0; width: 100%; box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2); }
        .footer p { margin: 0; font-size: 0.9em; }
        
        /* CSS Notifikasi (Sukses/Error Form) */
        .alert-success { max-width: 600px; margin: 10px auto; padding: 10px; background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; border-radius: .25rem; text-align: center; }
        .alert-error { max-width: 600px; margin: 10px auto; padding: 10px; background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; border-radius: .25rem; }
        .alert-error ul { list-style: none; padding: 0; margin: 0; text-align: left; }
    </style>
</head>
<body>
    
    {{-- 1. HEADER / NAVBAR --}}
    @include('components.navbar')

    {{-- 2. NOTIFIKASI FORM (Muncul di atas konten) --}}
    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert-error">
            <ul style="list-style: none; padding: 0; margin: 0; text-align: left;">
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{-- 3. SLOT KONTEN UTAMA --}}
    <main>
        {{-- Setiap view (home, profil, posts) akan mengisi slot @yield('content') ini --}}
        @yield('content')
    </main>

    {{-- 4. FOOTER --}}
    @include('components.footer')

</body>
</html>