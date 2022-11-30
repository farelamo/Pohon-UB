<?php

namespace App\Http\Resources\Api\Location;

use Illuminate\Http\Resources\Json\ResourceCollection;

class LocationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data'   => $this->collection
        ];
    }
}
