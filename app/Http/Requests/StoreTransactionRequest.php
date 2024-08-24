<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'borrower' => 'required',
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:borrow_date',
            'description' => 'nullable'
        ];
    }

    public function messages(){
        return [
            'borrower.required' => 'Nama peminjam tidak boleh kosong',
            'borrow_date.required' => 'Tanggal pinjam tidak boleh kosong',
            'return_date.required' => 'Tanggal kembali tidak boleh kosong',
            'return_date.after_or_equal' => 'Tanggal pinjam tidak lebih dari tanggal kembali.'
            
        ];
    }
}
