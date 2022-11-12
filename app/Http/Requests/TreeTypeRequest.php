<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreeTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'jenis pohon harus diisi', 
            'name.max'      => 'maximal jenis pohon adalah 100 karakter',
        ];
    }
}
