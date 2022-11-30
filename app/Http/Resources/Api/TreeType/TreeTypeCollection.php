<?php

namespace App\Http\Resources\Api\TreeType;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TreeTypeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data'   => $this->collection
        ];
    }
}
