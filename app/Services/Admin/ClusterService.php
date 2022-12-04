<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClusterRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
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
            $clusters    = Cluster::all();
            $tree_types  = TreeType::all();
            $locations   = Location::all();
            
            return view('admin.clusters.index', compact('clusters','tree_types','locations'));
        }catch (Exception $e){
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
            $cluster    = CLuster::where('id', $id)->first();
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
            return $this->index();
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
            return $this->index();
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
                if(Storage::disk('local')->exists('public/clusters/' . $cluster->image)){
                    Storage::delete('public/clusters/' . $cluster->image);
                }
                $cluster->delete();
            DB::commit();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return $this->index();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function updateImage(Request $request, $id)
    {
        $rules = [
            'image' => 'required|mimes:jpg,jpeg,png|max:5048',
        ];

        Validator::make($request->all(), $rules, $messages = 
        [
            'image.required'    => 'gambar harus diisi',
            'image.mimes'       => 'format gambar harus berupa JPG, PNG atau JPEG',
            'image.max'         => 'maximal gambar adalah 5 mb',
        ])->validate();

        try {
            DB::beginTransaction();

                $cluster = Cluster::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/clusters/' . $cluster->image)){
                    Storage::delete('public/clusters/' . $cluster->image);
                }
            
                $imageFile = $request->file('image');
                $image     = time() . '-' . $imageFile->getClientOriginalName();
                Storage::putFileAs('public/clusters/', $imageFile, $image);

                $cluster->update(['image' => $image]);

            DB::commit();

            Alert::success('Mantap', 'Gambar berhasil diupdate');
            return redirect()->back();
        }catch (Exception $e) {
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
