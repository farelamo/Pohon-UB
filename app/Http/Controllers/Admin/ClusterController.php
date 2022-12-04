<?php

namespace App\Http\Controllers\Admin;

use App\Services\Admin\ClusterService;
use App\Http\Requests\ClusterRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    public function updateImage(Request $request, $id)
    {
        return $this->service->updateImage($request, $id);
    }
}
