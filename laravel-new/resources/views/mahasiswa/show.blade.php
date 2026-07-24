@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <h1>Detail Mahasiswa</h1>

    <p>Stambuk: {{ $mahasiswa->stambuk }}</p>
    <p>Nama: {{ $mahasiswa->name }}</p>
    <p>Jurusan: {{ $mahasiswa->jurusan }}</p>

    <a href="{{ route('mahasiswa.index') }}">Kembali</a>
@endsection
