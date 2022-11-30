<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClusterRequest;
use App\Services\Admin\ClusterService;

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

    public function show($id)
    {
        return $this->service->show($id);
    }

    public function create()
    {
        return $this->service->create();
    }

    public function edit($id)
    {
        return $this->service->edit($id);
    }

    public function store(ClusterRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(ClusterRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
