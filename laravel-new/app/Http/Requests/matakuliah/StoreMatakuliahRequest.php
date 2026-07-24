<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMatakuliahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode'            => 'required|string|max:10|unique:mst_matakuliah,kode',
            'nama_matakuliah' => 'required|string|max:255',
            'sks'             => 'required|integer|min:1|max:6',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required'            => 'Kode matakuliah wajib diisi.',
            'kode.unique'              => 'Kode ini sudah digunakan.',
            'nama_matakuliah.required' => 'Nama matakuliah wajib diisi.',
            'sks.required'             => 'SKS wajib diisi.',
        ];
    }
}
