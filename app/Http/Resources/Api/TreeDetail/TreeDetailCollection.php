<?php

namespace App\Http\Resources\Api\TreeDetail;

use Illuminate\Http\Resources\Json\ResourceCollection;

class TreeDetailCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data'   => $this->collection
        ];
    }
}
