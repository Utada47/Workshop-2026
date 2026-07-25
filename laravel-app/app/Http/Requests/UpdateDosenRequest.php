<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDosenRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nip'  => 'sometimes|required|string|max:20|unique:mst_dosen,nip,' . $this->dosen->id,
            'name' => 'sometimes|required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'nip.unique' => 'NIP ini sudah terdaftar.',
        ];
    }
}
