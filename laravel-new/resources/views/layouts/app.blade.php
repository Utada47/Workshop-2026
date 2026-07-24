<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Manajemen Data')</title>
</head>
<body>
    <nav>
        <a href="{{ route('mahasiswa.index') }}">Mahasiswa</a>
        |
        <a href="{{ route('dosen.index') }}">Dosen</a>
        |
        <a href="{{ route('matakuliah.index') }}">Matakuliah</a>
    </nav>
    <hr>
    @yield('content')
</body>
</html>
