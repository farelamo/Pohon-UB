<?php

namespace App\Services\Admin;

use App\Http\Requests\LocationRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use Exception;
use Alert;
use Log;

class LocationService {

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $locations = Location::orderBy('id', 'desc')->get();

            return view('admin.location', compact('locations'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(LocationRequest $request)
    {
        try {
            Location::create($request->all());

            Alert::success('Mantap', 'Data berhasil ditambah');
            return redirect()->back();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(LocationRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $location = Location::where('id', $id)->first();
                $location->update($request->all());
            DB::commit();

            Alert::success('Mantap', 'Data berhasil diedit');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try{
            DB::beginTransaction();
                $location = Location::where('id', $id)->first();
                $location->delete();
            DB::commit();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
