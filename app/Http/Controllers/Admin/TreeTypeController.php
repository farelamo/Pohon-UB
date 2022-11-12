<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreeTypeRequest;
use App\Services\Admin\TreeTypeService;

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

    public function store(TreeTypeRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(TreeTypeRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->destroy($id);
    }
}
