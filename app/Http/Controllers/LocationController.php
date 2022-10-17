<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocationRequest;
use App\Services\LocationService;

class LocationController extends Controller
{
    public function __construct(LocationService $service)
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

    public function store(LocationRequest $request)
    {
        return $this->service->store($request);
    }

    public function update(LocationRequest $request, $id)
    {
        return $this->service->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->service->delete($id);
    }
}
