<?php

namespace App\Service\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClusterRequest;
use App\Models\Location;
use App\Models\TreeType;
use App\Models\Cluster;
use Exception;
use Alert;

class ClusterController extends Controller
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $locations  = Location::get(['id', 'name'])->toArray();
            $tree_types = TreeType::get(['id', 'name'])->toArray();
            $clusters   = Cluster::all();
            
            return view('', compact('clusters'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        try {
            $cluster = Cluster::where('id', $id)->first();

            return view('', compact('cluster'));
        } catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(ClusterRequest $request)
    {
        try {
            Cluster::create($request->all());

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(ClusterRequest $request, $id)
    {
        try {
            $cluster = Cluster::where('id', $id)->first();
            $cluster->update($request->all());

            return $this->show($id);
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try{
            $cluster = Cluster::where('id', $id)->first();
            $cluster->delete();

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
