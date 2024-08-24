<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'category_name' => 'required|string|max:255|unique:categories,category_name,',
        ];

    }

    public function messages() {
        return [
            'category_name.required' => 'Nama kategori tidak boleh kosong.',
            'category_name.unique' => 'Nama kategori sudah ada, silahkan gunakan nama lain.',
        ];
    }
}
