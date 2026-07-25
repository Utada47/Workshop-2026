@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1>Daftar Mahasiswa</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('mahasiswa.create') }}">+ Tambah Mahasiswa</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Stambuk</th>
                <th>Nama</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mahasiswa as $m)
                <tr>
                    <td>{{ $m->stambuk }}</td>
                    <td>{{ $m->name }}</td>
                    <td>{{ $m->jurusan }}</td>
                    <td>
                        <a href="{{ route('mahasiswa.show', $m) }}">Detail</a>
                        |
                        <a href="{{ route('mahasiswa.edit', $m) }}">Edit</a>
                        |
                        <form action="{{ route('mahasiswa.destroy', $m) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin hapus data mahasiswa ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
