<?php

namespace App\Http\Controllers;

use App\Services\TreeListService;
use App\Http\Requests\TreeListRequest;

class TreeListController extends Controller
{
    public function __construct(TreeListService $service)
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

    public function store(TreeListRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(TreeListRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function delete($id)
    {
        return $this->service->delete($id);
    }
}
