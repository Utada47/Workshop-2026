@extends('layouts.app')

@section('title', 'Edit Matakuliah')

@section('content')
    <h1>Edit Matakuliah</h1>

    <form method="POST" action="{{ route('matakuliah.update', $matakuliah) }}">
        @csrf
        @method('PUT')

        <div>
            <label>Kode</label><br>
            <input type="text" name="kode" value="{{ old('kode', $matakuliah->kode) }}">
            @error('kode') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>Nama Matakuliah</label><br>
            <input type="text" name="nama_matakuliah" value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}">
            @error('nama_matakuliah') <p>{{ $message }}</p> @enderror
        </div>

        <div>
            <label>SKS</label><br>
            <select name="sks">
                @foreach ([1, 2, 3, 4, 5, 6] as $sks)
                    <option value="{{ $sks }}" @selected(old('sks', $matakuliah->sks) == $sks)>{{ $sks }}</option>
                @endforeach
            </select>
            @error('sks') <p>{{ $message }}</p> @enderror
        </div>

        <br>
        <button type="submit">Perbarui</button>
        <a href="{{ route('matakuliah.index') }}">Batal</a>
    </form>
@endsection
