<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $table = 'mst_matakuliah';

    protected $fillable = [
        'kode', 'nama_matakuliah', 'sks',
    ];
}
