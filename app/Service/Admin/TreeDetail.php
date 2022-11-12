<?php

namespace App\Service\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TreeDetailRequest;
use App\Models\TreeDetail;
use Exception;
use Alert;

class TreeDetailController extends Controller
{

    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $tree_details = TreeDetail::all();
            
            return view('', compact('tree_details'));
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function show($id)
    {
        try {
            $tree_detail = TreeDetail::where('id', $id)->first();

            return view('', compact('tree_detail'));
        } catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function store(TreeDetailRequest $request)
    {
        try {
            TreeDetail::create($request->all());

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function update(TreeDetailRequest $request, $id)
    {
        try {
            $tree_detail = TreeDetail::where('id', $id)->first();
            $tree_detail->update($request->all());

            return $this->show($id);
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }

    public function destroy($id)
    {
        try{
            $tree_detail = TreeDetail::where('id', $id)->first();
            $tree_detail->delete();

            return $this->index();
        }catch (Exception $e){
            return $this->error('Terjadi Kesalahan');
        }
    }
}
