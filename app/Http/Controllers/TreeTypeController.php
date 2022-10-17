<?php

namespace App\Http\Controllers;

use App\Http\Requests\TreeTypeRequest;
use App\Services\TreeTypeService;

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

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
