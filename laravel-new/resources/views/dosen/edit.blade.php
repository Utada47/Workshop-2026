@extends('layouts.app')

@section('title', 'Edit Dosen')

@section('content')
    <h1>Edit Dosen</h1>

    <form method="POST" action="{{ route('dosen.update', $dosen) }}">
        @csrf
        @method('PUT')

        <div>
            <label>NIP</label><br>
            <input type="text" name="nip" value="{{ old('nip', $dosen->nip) }}">
            @error('nip') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama Lengkap</label><br>
            <input type="text" name="name" value="{{ old('name', $dosen->name) }}">
            @error('name') <p>{{ $message }}</p> @enderror
        </div>

        <br>
        <button type="submit">Perbarui</button>
        <a href="{{ route('dosen.index') }}">Batal</a>
    </form>
@endsection
