<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mst_matakuliah', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 10)->unique();
            $table->string('nama_matakuliah');
            $table->integer('sks');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mst_matakuliah');
    }
};
