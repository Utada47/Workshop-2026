<?php
// app/Services/MahasiswaService.php

namespace App\Services;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class MahasiswaService
{
    public function semua(): Collection
    {
        return Mahasiswa::orderBy('name')->get();
    }

    public function detail(int $id): Mahasiswa
    {
        return Mahasiswa::findOrFail($id);
    }

    public function buat(array $data): Mahasiswa
    {
        $mahasiswa = Mahasiswa::create($data);

        Log::info("Mahasiswa baru ditambahkan: {$mahasiswa->name} ({$mahasiswa->stambuk})");

        return $mahasiswa;
    }

    public function perbarui(Mahasiswa $mahasiswa, array $data): Mahasiswa
    {
        $mahasiswa->update($data);

        return $mahasiswa->fresh();
    }

    public function hapus(Mahasiswa $mahasiswa): void
    {
        Log::info("Mahasiswa dihapus: {$mahasiswa->name} ({$mahasiswa->stambuk})");

        $mahasiswa->delete();
    }
}