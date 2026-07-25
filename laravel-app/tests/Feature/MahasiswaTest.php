<?php

namespace Tests\Feature;

use App\Models\Mahasiswa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MahasiswaTest extends TestCase
{
    use RefreshDatabase;

    public function test_halaman_daftar_mahasiswa_bisa_diakses(): void
    {
        $response = $this->get(route('mahasiswa.index'));

        $response->assertOk();
    }

    public function test_user_bisa_menambah_data_mahasiswa_baru(): void
    {
        $response = $this->post(route('mahasiswa.store'), [
            'stambuk' => '20210011',
            'name' => 'Ahmad Fauzi',
            'jurusan' => 'Teknik Informatika',
        ]);

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseHas('mst_mahasiswa', ['stambuk' => '20210011']);
    }

    public function test_validasi_gagal_kalau_stambuk_kosong(): void
    {
        $response = $this->post(route('mahasiswa.store'), [
            'stambuk' => '',
            'name' => 'Ahmad Fauzi',
            'jurusan' => 'Teknik Informatika',
        ]);

        $response->assertSessionHasErrors('stambuk');
    }

    public function test_tidak_bisa_mendaftar_dengan_stambuk_yang_sudah_dipakai(): void
    {
        Mahasiswa::create([
            'stambuk' => '20210011',
            'name' => 'Ahmad Fauzi',
            'jurusan' => 'Teknik Informatika',
        ]);

        $response = $this->post(route('mahasiswa.store'), [
            'stambuk' => '20210011',
            'name' => 'Nama Lain',
            'jurusan' => 'Sistem Informasi',
        ]);

        $response->assertSessionHasErrors('stambuk');
    }

    public function test_user_bisa_mengubah_data_mahasiswa(): void
    {
        $mahasiswa = Mahasiswa::create([
            'stambuk' => '20210011',
            'name' => 'Ahmad Fauzi',
            'jurusan' => 'Teknik Informatika',
        ]);

        $response = $this->put(route('mahasiswa.update', $mahasiswa), [
            'name' => 'Ahmad Fauzi Update',
        ]);

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseHas('mst_mahasiswa', ['name' => 'Ahmad Fauzi Update']);
    }

    public function test_user_bisa_menghapus_data_mahasiswa(): void
    {
        $mahasiswa = Mahasiswa::create([
            'stambuk' => '20210011',
            'name' => 'Ahmad Fauzi',
            'jurusan' => 'Teknik Informatika',
        ]);

        $response = $this->delete(route('mahasiswa.destroy', $mahasiswa));

        $response->assertRedirect(route('mahasiswa.index'));
        $this->assertDatabaseMissing('mst_mahasiswa', ['id' => $mahasiswa->id]);
    }
}
