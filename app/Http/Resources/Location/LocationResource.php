<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'success'  => true,
            'message'  => 'successfully get data',
            'data'     => [
                'id'            => $this->id,
                'name'          => $this->name,
                'created_at'    => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at'    => $this->updated_at->format('Y-m-d H:i:s'),
            ]
        ];
    }
}
