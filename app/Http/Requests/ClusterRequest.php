<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClusterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'location_id'   => 'required|exists:locations,id',
            'tree_type_id'  => 'required|exists:tree_types,id',
            'donatures'     => 'required',
            'polygon_data'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'location_id.required'  => 'lokasi harus dipilih', 
            'location_id.exists'    => 'lokasi tidak ditemukan', 
            'tree_type_id.required' => 'jenis pohon harus dipilih',
            'tree_type_id.exists'   => 'jenis pohon tidak ditemukan', 
            'donatures.required'    => 'donature harus diisi', 
            'polygon_data.required' => 'polygon data harus diisi', 
        ];
    }
}
