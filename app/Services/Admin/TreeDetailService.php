<?php

namespace App\Services\Admin;

use App\Http\Requests\TreeDetailRequest;
use Illuminate\Support\Facades\DB;
use App\Models\TreeDetail;
use App\Models\Cluster;
use Carbon\Carbon;
use Exception;
use Alert;

class TreeDetailService
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $tree_details = TreeDetail::orderBy('id', 'desc')->get();
            $clusters     = Cluster::orderBy('id', 'desc')->get();

            return view('admin.tree', compact('tree_details', 'clusters'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(TreeDetailRequest $request)
    {
        try {
            TreeDetail::create([
                'cluster_id' => $request->cluster_id,
                'tall'       => $request->tall,
                'year'       => Carbon::now()->format('Y')
            ]);

            Alert::success('Mantap', 'Data berhasil ditambah');
            return redirect()->back();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(TreeDetailRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $tree_detail = TreeDetail::where('id', $id)->first();
                $tree_detail->update($request->all());
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
                $tree_detail = TreeDetail::where('id', $id)->first();
                $tree_detail->delete();
            DB::commit();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
