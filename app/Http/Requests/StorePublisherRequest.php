<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePublisherRequest extends FormRequest
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
        return [
            'publisher_name' => 'required|string|max:255|unique:publishers,publisher_name',
        ];

    }

    public function messages() {
        return [
            'publisher_name.required' => 'Nama publisher tidak boleh kosong.',
            'publisher_name.unique' => 'Nama publisher sudah ada, silahkan gunakan nama lain.',
        ];
    }
}
