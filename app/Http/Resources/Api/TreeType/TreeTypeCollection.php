<?php

namespace App\Http\Resources\Api\TreeType;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Facades\Storage;

class TreeTypeCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'status' => 'success',
            'data'   => $this->collection->transform(function ($data) {
                return [
                    'id'        => $data->id,
                    'name'      => $data->name,
                    'icon'      => $data->ori_icon ? 
                                    stripslashes(env('APP_URL') . Storage::url('public/tree_type/ori_icon/' . $data->ori_icon))
                                    :
                                    null,
                    'icon_2x'   => $data->modif_icon ? 
                                    stripslashes(env('APP_URL') . Storage::url('public/tree_type/modif_icon/' . $data->modif_icon))
                                    :
                                    null,
                ];
            })
        ];
    }
}
