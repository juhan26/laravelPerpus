<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAuthorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('author'); // Mendapatkan ID dari rute

        return [
            'name' => [
                'required',
                'max:100',
                Rule::unique('authors')->ignore($id),
            ],
            'address' => 'required|max:255',
            'phone' => [
                'required',
                'min:10',
                'numeric',
                Rule::unique('authors')->ignore($id),
            ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama author tidak boleh kosong',
            'name.unique' => 'Nama author tidak boleh sama',
            'address.required' => 'Alamat tidak boleh kosong',
            'address.max' => 'Alamat tidak bisa lebih dari 255 karakter',
            'phone.required' => 'Nomor Telepon tidak boleh kosong',
            'phone.min' => 'Nomor Telepon tidak bisa kurang dari 10 angka',
            'phone.numeric' => 'Nomor Telepon harus menggunakan angka.',
            'phone.unique' => 'Nomor Telepon sudah terdaftar.',
        ];
    }
}
