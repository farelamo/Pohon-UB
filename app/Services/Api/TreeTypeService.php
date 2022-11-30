<?php

namespace App\Services\Api;

use App\Models\TreeType;
use App\Http\Resources\Api\TreeType\TreeTypeCollection;

class TreeTypeService
{
    public function index()
    {
        $tree_types = TreeType::select('id', 'name')->get();
        return new TreeTypeCollection($tree_types);
    }
}
