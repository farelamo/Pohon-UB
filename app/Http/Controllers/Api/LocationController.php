<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\LocationService;

class LocationController extends Controller
{
    public function __construct(LocationService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
}
