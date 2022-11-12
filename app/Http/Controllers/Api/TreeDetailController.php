<?php

namespace App\Http\Controllers\Admin;

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

    public function show($id)
    {
        return $this->service->show($id);
    }
}
