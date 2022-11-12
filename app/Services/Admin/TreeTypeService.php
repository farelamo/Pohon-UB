<?php

namespace App\Services\Admin;

use App\Http\Requests\TreeTypeRequest;
use Illuminate\Support\Facades\DB;
use App\Models\TreeType;
use Exception;
use Alert;

class TreeTypeService
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $tree_types = TreeType::all();
            
            return view('admin.type', compact('tree_types'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        try {
            $tree_type = TreeType::where('id', $id)->first();

            return view('', compact('tree_type'));
        } catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(TreeTypeRequest $request)
    {
        try {
            TreeType::create($request->all());

            Alert::success('Mantap', 'Data berhasil ditambah');
            return redirect()->back();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(TreeTypeRequest $request, $id)
    {
        try {
            DB::beginTransaction();
                $tree_type = TreeType::where('id', $id)->first();
                $tree_type->update($request->all());
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
                $tree_type = TreeType::where('id', $id)->first();
                $tree_type->delete();
            DB::commit();

            Alert::success('Mantap', 'Data berhasil dihapus');
            return redirect()->back();
        }catch (Exception $e){
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
