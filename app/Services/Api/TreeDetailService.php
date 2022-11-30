<?php

namespace App\Services\Api;

use App\Models\TreeDetail;

class TreeDetailService
{
    public function index()
    {
        $tree_detail = TreeDetail::all();
        return 'index';
    }
}
