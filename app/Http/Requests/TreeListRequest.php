<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TreeListRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'tree_type_id'  => 'required|exists:tree_types,id',
            'location_id'   => 'required|exists:locations,id',
            'lat'           => 'required|integer',
            'long'          => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'tree_type_id.required'  => 'Tree type must be choosed',
            'location_id.required'   => 'Location must be choosed',
            'tree_type_id.exists'    => "Tree type doesn't exists",
            'location_id.exists'     => "Location doesn't exists",
            'lat.required'           => 'Latitude must be filled',
            'long.required'          => 'Longitude must be filled',
            'lat.integer'            => 'Latitude must be type of number',
            'long.integer'           => 'Longitude must be type of number',
        ];
    }
}
