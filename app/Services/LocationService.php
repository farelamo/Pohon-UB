<?php

namespace App\Services;

use Exception;
use App\Models\Location;
use App\Http\Requests\LocationRequest;
use App\Http\Resources\Location\LocationCollection;
use App\Http\Resources\Location\LocationResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LocationService {

    public function index()
    {
        try {

            $location = Location::all();
            return new LocationCollection($location);
        }catch (Exception $e){
            abort(500, $e->getMessage());
        }
    }

    public function show($id)
    {
        try {

            $location = Location::find($id)->first();
            return new LocationResource($location);
        } catch(ModelNotFoundException $e){
            throw new ModelNotFoundException(basename($e->getFile()).":{$e->getLine()} ({$e->getMessage()})");
        }
    }

    public function store(LocationRequest $request)
    {
        try {
            
            $location = Location::create(['name' => $request->name]);
            return $this->show($location);
        }catch (Exception $e){
            abort(500, 'Could not create location');
        }
    }

    public function update(LocationRequest $request, $id)
    {
        try {
            
            $location = Location::findOrFail($id);
            $location->update(['name' => $request->name]);

            return $this->show($location);
        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e->getMessage());
        }catch(Exception $e){
            abort(500, 'Could not update location name');
        }
    }

    public function delete($id)
    {
        try {

            $location = Location::findOrFail($id);
            $location->delete();

            return response()->json([
                'status'  => true,
                'message' => 'Data location has been deleted'
            ]);
        }catch(ModelNotFoundException $e){
            throw new ModelNotFoundException($e->getMessage());
        }catch(Exception $e){
            abort(500, 'Could not delete location');
        }
    }
}

?>