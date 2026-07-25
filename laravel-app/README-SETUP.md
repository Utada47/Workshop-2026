# Manajemen Data Mahasiswa — Laravel 12 + MySQL

Studi kasus CRUD lengkap: Migration → Model → Request → Service → Controller → View → Routes.

## Struktur Fitur

| File | Tanggung Jawab |
|---|---|
| `database/migrations/2024_01_01_000000_create_mst_mahasiswa_table.php` | Struktur tabel `mst_mahasiswa` |
| `app/Models/Mahasiswa.php` | Model Eloquent |
| `app/Http/Requests/StoreMahasiswaRequest.php` & `UpdateMahasiswaRequest.php` | Validasi input |
| `app/Services/MahasiswaService.php` | Logic bisnis (CRUD + pencarian) |
| `app/Http/Controllers/MahasiswaController.php` | Resource controller (tipis) |
| `resources/views/mahasiswa/*.blade.php` | Tampilan (index, create, edit, show) |
| `routes/web.php` | `Route::resource('mahasiswa', ...)` |
| `tests/Feature/MahasiswaTest.php` | Feature test CRUD & validasi |
| `database/factories/MahasiswaFactory.php` + `database/seeders/MahasiswaSeeder.php` | Data dummy (10 mahasiswa) |

## Langkah Instalasi

1. **Install dependency PHP**
   ```bash
   composer install
   ```

2. **Salin file environment & generate app key**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

3. **Buat database MySQL**
   ```sql
   CREATE DATABASE db_pendidikan;
   ```
   Sesuaikan kredensial di `.env` bila perlu (`DB_USERNAME`, `DB_PASSWORD`, `DB_HOST`, `DB_PORT`). Default:
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=db_pendidikan
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Migrasi + seed data dummy (opsional)**
   ```bash
   php artisan migrate --seed
   ```
   (`--seed` akan membuat 1 user test + 10 data mahasiswa dummy via Faker)

5. **Jalankan server**
   ```bash
   php artisan serve
   ```
   Buka `http://127.0.0.1:8000` — otomatis redirect ke `/mahasiswa`.

6. **Jalankan test**
   ```bash
   php artisan test --filter=MahasiswaTest
   ```

## Fitur

- **Index**: daftar mahasiswa (card grid) + pencarian by nama/jurusan (`?q=`)
- **Create**: form tambah dengan validasi (stambuk unik) + flash message
- **Edit**: form ubah data
- **Show**: detail mahasiswa termasuk angkatan (dihitung dari 4 digit awal stambuk)
- **Delete**: hapus dengan konfirmasi JS, tercatat di `storage/logs/laravel.log`

## Catatan

Project ini adalah skeleton resmi Laravel 12 (`laravel/laravel`) + fitur di atas.
View memakai Tailwind CSS lewat CDN (`<script src="https://cdn.tailwindcss.com">`) sehingga
**tidak perlu** menjalankan `npm install` / `npm run build` untuk langsung mencoba aplikasinya.
Jika ingin proses build asset Vite standar Laravel, tetap tersedia via `npm install && npm run dev`.
