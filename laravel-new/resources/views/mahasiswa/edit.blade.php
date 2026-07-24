@extends('layouts.app')

@section('title', 'Edit Mahasiswa')

@section('content')
    <h1>Edit Mahasiswa</h1>

    <form method="POST" action="{{ route('mahasiswa.update', $mahasiswa) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Stambuk</label><br>
            <input type="text" name="stambuk" value="{{ old('stambuk', $mahasiswa->stambuk) }}">
            @error('stambuk') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama Lengkap</label><br>
            <input type="text" name="name" value="{{ old('name', $mahasiswa->name) }}">
            @error('name') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Jurusan</label><br>
            <select name="jurusan">
                @foreach (['Teknik Informatika', 'Sistem Informasi', 'Ilmu Komputer'] as $jurusan)
                    <option value="{{ $jurusan }}" @selected(old('jurusan', $mahasiswa->jurusan) === $jurusan)>{{ $jurusan }}</option>
                @endforeach
            </select>
            @error('jurusan') <p>{{ $message }}</p> @enderror
        </div>

        <br>
        <button type="submit">Perbarui</button>
        <a href="{{ route('mahasiswa.index') }}">Batal</a>
    </form>
@endsection
