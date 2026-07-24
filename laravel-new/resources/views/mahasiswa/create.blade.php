{{-- resources/views/mahasiswa/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Tambah Mahasiswa</h1>

    <form method="POST" action="{{ route('mahasiswa.store') }}" class="space-y-4 max-w-md">
        @csrf

        <div>
            <label class="block font-medium">Stambuk</label>
            <input type="text" name="stambuk" value="{{ old('stambuk') }}" class="border rounded w-full p-2">
            @error('stambuk') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="border rounded w-full p-2">
            @error('name') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block font-medium">Jurusan</label>
            <select name="jurusan" class="border rounded w-full p-2">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Ilmu Komputer">Ilmu Komputer</option>
            </select>
            @error('jurusan') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection