<?php

namespace App\Service\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreeTypeRequest;
use App\Models\TreeType;
use Exception;
use Alert;

class TreeTypeController extends Controller
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $tree_types = TreeType::all();
            
            return view('', compact('tree_types'));
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

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(TreeTypeRequest $request, $id)
    {
        try {
            $tree_type = TreeType::where('id', $id)->first();
            $tree_type->update($request->all());

            return $this->show($id);
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try{
            $tree_type = TreeType::where('id', $id)->first();
            $tree_type->delete();

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
