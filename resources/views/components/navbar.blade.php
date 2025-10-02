<style>
    /* CSS untuk Navigasi Bar */
    .navbar {
        background-color: #333;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        margin-bottom: 20px;
    }
    .navbar a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }
    .navbar a:hover {
        background-color: #ddd;
        color: black;
    }
    .navbar a.active {
        background-color: #007bff;
        color: white;
    }
</style>

<div class="navbar">
    {{-- Link ke halaman Profil --}}
    <a href="{{ url('/profil') }}" class="{{ Request::is('profil') ? 'active' : '' }}">Profil Saya</a>
    
    {{-- Link ke halaman Kontak --}}
    <a href="{{ url('/kontak') }}" class="{{ Request::is('kontak') ? 'active' : '' }}">Hubungi Saya</a>
</div>