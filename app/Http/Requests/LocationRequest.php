<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LocationRequest extends FormRequest
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
            'name.required' => 'nama lokasi harus diisi', 
            'name.max'      => 'maximal lokasi adalah 100 karakter',
        ];
    }
}
