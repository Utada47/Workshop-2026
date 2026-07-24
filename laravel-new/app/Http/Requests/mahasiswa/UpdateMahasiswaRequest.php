<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'stambuk' => 'sometimes|required|string|max:11|unique:mst_mahasiswa,stambuk,' . $this->mahasiswa->id,
            'name' => 'sometimes|required|string|max:255',
            'jurusan' => 'sometimes|required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'stambuk.unique' => 'Stambuk ini sudah terdaftar.',
        ];
    }
}
