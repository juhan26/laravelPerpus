<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePublisherRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        $id = $this->route("publisher");
        
        return [
            'publisher_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('publishers', 'publisher_name')->ignore($id),
            ],
        ];
    }

    public function messages() {
        return [
            'publisher_name.required' => 'Nama publisher tidak boleh kosong.',
            'publisher_name.unique' => 'Nama publisher sudah ada, silahkan gunakan nama lain.',
        ];
    }
}
