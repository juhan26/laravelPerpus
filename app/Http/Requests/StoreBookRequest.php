<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'title' => 'required|max:100',
            'category_id' => 'required|max:255',
            'author_id' => 'required|max:255',
            'publisher_id' => 'required|max:255',
            'publisher_year' => 'required|numeric|max:'.date('2024'),

            
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Judul buku tidak boleh kosong',
            'category_id.required' => 'Category tidak boleh kosong',
            'author_id.required' => 'Category tidak boleh kosong',
            'publisher_id.required' => 'Publisher tidak boleh kosong',
            'publisher_year.required' => 'Publisher tidak boleh kosong',
            'publisher_year.numeric' => 'Publisher Year harus angka',
            'publisher_year.max' => 'Publisher Year tidak bisa lebih dari tahun ini'
        ];
    }
}
