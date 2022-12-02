<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\ClusterService;
use App\Models\Cluster;

class ClusterController extends Controller
{
    public function __construct(ClusterService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }

    public function find(Cluster $cluster){
        return $cluster;
    }
}
