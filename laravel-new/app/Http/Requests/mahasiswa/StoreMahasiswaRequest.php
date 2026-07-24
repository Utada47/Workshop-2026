<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'stambuk' => 'required|string|max:11|unique:mst_mahasiswa,stambuk',
            'name' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'stambuk.required' => 'Stambuk wajib diisi.',
            'stambuk.unique' => 'Stambuk ini sudah terdaftar.',
        ];
    }
}
