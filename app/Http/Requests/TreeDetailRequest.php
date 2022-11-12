<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreeDetailRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'cluster_id'    => 'required|exists:clusters,id',
            'tall'          => 'required',
        ];
    }

    public function messages()
    {
        return [
            'tall.required'     => 'panjang pohon harus diisi', 
            'cluster_id.max'    => 'cluster harus dipilih',
        ];
    }
}
