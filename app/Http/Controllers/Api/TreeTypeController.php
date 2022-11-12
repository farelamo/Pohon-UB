<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Api\TreeTypeService;

class TreeTypeController extends Controller
{
    public function __construct(TreeTypeService $service)
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
