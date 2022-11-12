<?php

namespace App\Service\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LocationRequest;
use App\Models\Location;
use Exception;
use Alert;

class LocationController extends Controller
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $locations = Location::all();

            return view('', compact('locations'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        try {
            $location = Location::where('id', $id)->first();

            return view('', compact('location'));
        } catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(LocationRequest $request)
    {
        try {
            Location::create($request->all());

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(LocationRequest $request, $id)
    {
        try {
            $location = Location::where('id', $id)->first();
            $location->update($request->all());

            return $this->show($id);
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try{
            $location = Location::where('id', $id)->first();
            $location->delete();

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
