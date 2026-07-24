@extends('layouts.app')

@section('title', 'Daftar Dosen')

@section('content')
    <h1>Daftar Dosen</h1>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <a href="{{ route('dosen.create') }}">+ Tambah Dosen</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dosen as $d)
                <tr>
                    <td>{{ $d->nip }}</td>
                    <td>{{ $d->name }}</td>
                    <td>
                        <a href="{{ route('dosen.show', $d) }}">Detail</a>
                        |
                        <a href="{{ route('dosen.edit', $d) }}">Edit</a>
                        |
                        <form action="{{ route('dosen.destroy', $d) }}" method="POST" style="display:inline"
                              onsubmit="return confirm('Yakin hapus data dosen ini?')">
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
