<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\DashboardService;

class DashboardController extends Controller
{
    public function __construct(DashboardService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return $this->service->index();
    }
}
