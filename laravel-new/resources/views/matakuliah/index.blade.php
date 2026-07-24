@extends('layouts.app')

@section('title', 'Daftar Matakuliah')

@section('content')
    <h1>Daftar Matakuliah</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('matakuliah.create') }}">+ Tambah Matakuliah</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama Matakuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($matakuliah as $mk)
                <tr>
                    <td>{{ $mk->kode }}</td>
                    <td>{{ $mk->nama_matakuliah }}</td>
                    <td>{{ $mk->sks }}</td>
                    <td>
                        <a href="{{ route('matakuliah.show', $mk) }}">Detail</a>
                        |
                        <a href="{{ route('matakuliah.edit', $mk) }}">Edit</a>
                        |
                        <form action="{{ route('matakuliah.destroy', $mk) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin hapus data matakuliah ini?')">
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
