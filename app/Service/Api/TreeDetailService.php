<?php

namespace App\Services\Api;

use App\Models\TreeDetail;

class TreeDetailService extends Controller
{
    public function index()
    {
        $tree_detail = TreeDetail::all();
        return 'index';
    }

    public function show($id)
    {
        $tree_detail = TreeDetail::where('id', $id)->first();
        return 'show';
    }
}
