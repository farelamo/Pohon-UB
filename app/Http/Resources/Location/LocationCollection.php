<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success'  => true,
            'message'  => 'successfully get data',
            'data'     => $this->collection->transform(function($data){
                return [
                    'id'            => $data->id,
                    'name'          => $data->name,
                    'created_at'    => $data->created_at->format('Y-m-d H:i:s'),
                    'updated_at'    => $data->updated_at->format('Y-m-d H:i:s'),
                ];
            })
        ];
    }
}
