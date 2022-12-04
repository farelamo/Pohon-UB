<?php

namespace App\Services\Api;

use App\Models\Cluster;
use App\Http\Resources\Api\Cluster\ClusterCollection;

class ClusterService
{
    public function index()
    {
        $clusters = Cluster::whereNotNull('image')->get();
        return new ClusterCollection($clusters);
    }
}
