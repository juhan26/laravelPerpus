<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTransactionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'borrower' => 'required',
            'borrow_date' => 'required',
            'return_date' => 'required',
            'description' => 'nullable'
        ];
    }

    public function messages(){
        return [
            'borrower.required' => 'Nama peminjam tidak boleh kosong',
            'borrow_date.required' => 'Tanggal pinjam tidak boleh kosong',
            'return_date.required' => 'Tanggal kembali tidak boleh kosong',
        ];
    }
}
