<?php

namespace App\Http\Requests\mahasiswa;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "stambuk" => ['required', 'string', 'max:20', 'unique:mst_mahasiswas,stambuk'],
            "nama" => ['required', 'string', 'max:100'],
            "jurusan" => ['required', 'string', 'max:100']
        ];
    }

    public function messages(): array
    {
        return [
            "stambuk.required" => "Stambuk wajib diisi",
            "stambuk.string" => "Stambuk harus berupa string",
            "stambuk.max" => "Stambuk maksimal 20 karakter",
            "stambuk.unique" => "Stambuk sudah digunakan",
            "nama.required" => "Nama wajib diisi",
            "nama.string" => "Nama harus berupa string",
            "nama.max" => "Nama maksimal 100 karakter",
            "jurusan.required" => "Jurusan wajib diisi",
            "jurusan.string" => "Jurusan harus berupa string",
            "jurusan.max" => "Jurusan maksimal 100 karakter"
        ];
    }
}
