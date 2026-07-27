@extends('layouts.app')

@section('title', 'Tambah Dosen')

@section('content')
    <h1>Tambah Dosen</h1>

    <form method="POST" action="{{ route('dosen.store') }}">
        @csrf

        <div>
            <label>NIP</label><br>
            <input type="text" name="nip" value="{{ old('nip') }}">
            @error('nip') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama panjang</label><br>
            <input type="text" name="name" value="{{ old('name') }}">
            @error('name') <p>{{ $message }}</p> @enderror
        </div>

        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('dosen.index') }}">Batal</a>
    </form>
@endsection
