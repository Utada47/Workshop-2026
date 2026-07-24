@extends('layouts.app')

@section('title', 'Detail Matakuliah')

@section('content')
    <h1>Detail Matakuliah</h1>

    <p>Kode: {{ $matakuliah->kode }}</p>
    <p>Nama Matakuliah: {{ $matakuliah->nama_matakuliah }}</p>
    <p>SKS: {{ $matakuliah->sks }}</p>

    <a href="{{ route('matakuliah.index') }}">Kembali</a>
@endsection
