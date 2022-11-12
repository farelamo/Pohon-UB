<?php

namespace App\Services\Api;

use App\Models\Location;

class LocationService extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return 'index';
    }

    public function show($id)
    {
        $location = Location::where('id', $id)->first();
        return 'show';
    }
}
