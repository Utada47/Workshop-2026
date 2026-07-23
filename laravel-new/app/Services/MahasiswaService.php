<?php
// app/Services/MahasiswaService.php

namespace App\Services;

use App\Models\Mahasiswa;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;

class MahasiswaService
{
    public function getAllMahasiswa(): Collection
    {
        return Mahasiswa;
    }
}