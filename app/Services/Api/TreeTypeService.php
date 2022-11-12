<?php

namespace App\Services\Api;

use App\Models\TreeType;

class TreeTypeService extends Controller
{
    public function index()
    {
        $tree_type = TreeType::all();
        return 'index';
    }

    public function show($id)
    {
        $tree_type = TreeType::where('id', $id)->first();
        return 'show';
    }
}
