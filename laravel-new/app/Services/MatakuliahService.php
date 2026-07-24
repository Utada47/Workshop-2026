<?php

namespace App\Services;

use App\Models\Matakuliah;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class MatakuliahService
{
    public function semua(): Collection
    {
        return Matakuliah::orderBy('nama_matakuliah')->get();
    }

    public function buat(array $data): Matakuliah
    {
        $matakuliah = Matakuliah::create($data);

        Log::info("Matakuliah baru ditambahkan: {$matakuliah->nama_matakuliah} ({$matakuliah->kode})");

        return $matakuliah;
    }

    public function perbarui(Matakuliah $matakuliah, array $data): Matakuliah
    {
        $matakuliah->update($data);

        return $matakuliah->fresh();
    }

    public function hapus(Matakuliah $matakuliah): void
    {
        Log::info("Matakuliah dihapus: {$matakuliah->nama_matakuliah} ({$matakuliah->kode})");

        $matakuliah->delete();
    }
}
