@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')

@section('content')
    <h1>Tambah Mahasiswa</h1>

    <form method="POST" action="{{ route('mahasiswa.store') }}">
        @csrf

        <div>
            <label>Stambuk</label><br>
            <input type="text" name="stambuk" value="{{ old('stambuk') }}">
            @error('stambuk') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama Lengkap</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Jurusan</label><br>
            <select name="jurusan">
                <option value="Teknik Informatika">Teknik Informatika</option>
                <option value="Sistem Informasi">Sistem Informasi</option>
                <option value="Ilmu Komputer">Ilmu Komputer</option>
            </select>
            @error('jurusan') <p>{{ $message }}</p> @enderror
        </div>

        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>
@endsection
