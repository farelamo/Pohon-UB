<?php

namespace App\Services\Api;

use App\Models\Cluster;

class ClusterService extends Controller
{
    public function index()
    {
        $clusters = Cluster::all();
        return 'index';
    }

    public function show($id)
    {
        $cluster = Cluster::where('id', $id)->first();
        return 'show';
    }
}
