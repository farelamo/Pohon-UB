<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Api\TreeDetailService;

class TreeDetailController extends Controller
{
    public function __construct(TreeDetailService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
}
