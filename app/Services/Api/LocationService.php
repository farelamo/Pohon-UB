<?php

namespace App\Services\Api;

use App\Models\Location;
use App\Http\Resources\Api\Location\LocationCollection;

class LocationService
{
    public function index()
    {
        $locations = Location::select('id','name')->get();
        return new LocationCollection($locations);
    }
}
