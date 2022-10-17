<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreeType extends FormRequest
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
            'name.required' => "field name can't be null",
            'name.max'      => 'maximum field name is 100 characters'
        ];
    }
}
