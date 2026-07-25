<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mst_mahasiswa'; // nama tabel tidak mengikuti konvensi default ("mahasiswas")

    protected $fillable = [
        'stambuk', 'name', 'jurusan',
    ];

    public function angkatan(): string
    {
        // 4 digit pertama stambuk dianggap sebagai tahun angkatan, mis. "20210011" -> "2021"
        return substr($this->stambuk, 0, 4);
    }
}
