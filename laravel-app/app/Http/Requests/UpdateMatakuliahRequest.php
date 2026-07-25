<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMatakuliahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'kode'            => 'sometimes|required|string|max:10|unique:mst_matakuliah,kode,' . $this->matakuliah->id,
            'nama_matakuliah' => 'sometimes|required|string|max:255',
            'sks'             => 'sometimes|required|integer|min:1|max:6',
        ];
    }

    public function messages(): array
    {
        return [
            'kode.unique' => 'Kode ini sudah digunakan.',
        ];
    }
}
