<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDosenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nip'  => 'required|string|max:20|unique:mst_dosen,nip',
            'name' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nip.required' => 'NIP wajib diisi.',
            'nip.unique'   => 'NIP ini sudah terdaftar.',
        ];
    }
}
