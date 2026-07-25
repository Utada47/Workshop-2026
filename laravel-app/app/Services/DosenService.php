<?php

namespace App\Services;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class DosenService
{
    public function semua(): Collection
    {
        return Dosen::orderBy('name')->get();
    }

    public function buat(array $data): Dosen
    {
        $dosen = Dosen::create($data);

        Log::info("Dosen baru ditambahkan: {$dosen->name} ({$dosen->nip})");

        return $dosen;
    }

    public function perbarui(Dosen $dosen, array $data): Dosen
    {
        $dosen->update($data);

        return $dosen->fresh();
    }

    public function hapus(Dosen $dosen): void
    {
        Log::info("Dosen dihapus: {$dosen->name} ({$dosen->nip})");

        $dosen->delete();
    }
}
