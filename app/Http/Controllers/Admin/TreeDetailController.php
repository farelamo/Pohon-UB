<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreeDetailRequest;
use App\Services\Admin\TreeDetailService;

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

    public function store(TreeDetailRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(TreeDetailRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
