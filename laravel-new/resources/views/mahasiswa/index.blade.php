{{-- resources/views/mahasiswa/index.blade.php --}}
@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Daftar Mahasiswa</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <a href="{{ route('mahasiswa.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded inline-block mb-4">
        + Tambah Mahasiswa
    </a>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($mahasiswa as $m)
            <div class="border rounded-lg p-4">
                <h3 class="font-bold">{{ $m->name }}</h3>
                <p class="text-gray-600">Stambuk: {{ $m->stambuk }}</p>
                <p>{{ $m->jurusan }}</p>

                <div class="flex gap-2 mt-3">
                    <a href="{{ route('mahasiswa.show', $m) }}">Detail</a>
                    <a href="{{ route('mahasiswa.edit', $m) }}">Edit</a>
                    <form action="{{ route('mahasiswa.destroy', $m) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus data mahasiswa ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600">Hapus</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection