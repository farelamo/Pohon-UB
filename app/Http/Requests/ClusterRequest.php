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
            'name'          => 'required|max:100',
            'location_id'   => 'required|exists:locations,id',
            'tree_type_id'  => 'required|exists:tree_types,id',
            'donatures'     => 'required',
            'polygon_data'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'nama cluster harus diisi', 
            'name.max'              => 'maximal nama cluster 100 karakter', 
            'location_id.required'  => 'lokasi harus dipilih', 
            'location_id.exists'    => 'lokasi tidak ditemukan', 
            'tree_type_id.required' => 'jenis pohon harus dipilih',
            'tree_type_id.exists'   => 'jenis pohon tidak ditemukan', 
            'donatures.required'    => 'donature harus diisi', 
            'polygon_data.required' => 'penanda lokasi harus diisi', 
        ];
    }
}
