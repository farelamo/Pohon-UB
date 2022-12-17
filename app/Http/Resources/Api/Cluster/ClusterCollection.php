<?php

namespace App\Http\Resources\Api\Cluster;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\Api\TreeType\TreeTypeResource;
use Illuminate\Support\Facades\Storage;

class ClusterCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data'   => $this->collection->transform(function ($data) {
                return [ 
                    'id'            => $data->id,
                    'tree_type'     => $data->tree_type->name,
                    'location'      => $data->location->name,
                    'donatures'     => $data->donatures,
                    'name'          => $data->name,
                    'polygon_data'  => json_decode($data->polygon_data),
                    'tree_count'    => count($data->tree_details),
                    'avg_tall'      => round($data->tree_details->avg('tall'), 2),
                    'image'         => stripslashes(env('APP_URL') . Storage::url('public/clusters/' . $data->image)),
                ];
            })
        ];
    }
}
