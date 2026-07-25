@extends('layouts.app')

@section('title', 'Detail Dosen')

@section('content')
    <h1>Detail Dosen</h1>

    <p>NIP: {{ $dosen->nip }}</p>
    <p>Nama: {{ $dosen->name }}</p>

    <a href="{{ route('dosen.index') }}">Kembali</a>
@endsection
