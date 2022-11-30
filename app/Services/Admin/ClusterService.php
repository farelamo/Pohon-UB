<?php

namespace App\Services\Admin;

use App\Http\Requests\ClusterRequest;
use Illuminate\Support\Facades\DB;
use App\Models\Location;
use App\Models\TreeType;
use App\Models\Cluster;
use Exception;
use Alert;

class ClusterService
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $clusters   = Cluster::all();
            
            return view('admin.clusters.index', compact('clusters'));
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

    public function create()
    {
        try {
            $locations  = Location::get(['id', 'name'])->toArray();
            $tree_types = TreeType::get(['id', 'name'])->toArray();
            
            return view('admin.clusters.create', compact('locations', 'tree_types'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function edit($id)
    {
        try{
            $cluster    = CLuster::where('id', $id)->get();
            $locations  = Location::get(['id', 'name'])->toArray();
            $tree_types = TreeType::get(['id', 'name'])->toArray();
            
            return view('admin.clusters.edit', compact('cluster', 'locations', 'tree_types'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(ClusterRequest $request)
    {
        try {
            Cluster::create($request->all());

            Alert::success('Mantap', 'Data berhasil ditambah');
            return redirect()->back();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(ClusterRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $cluster = Cluster::where('id', $id)->first();
                $cluster->update($request->all());
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
                $cluster = Cluster::where('id', $id)->first();
                $cluster->delete();
            DB::commit();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
