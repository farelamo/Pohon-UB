<?php

namespace App\Services\Admin;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TreeTypeRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\TreeType;
use Exception;
use Alert;
use Image;

class TreeTypeService
{
    public function error($kalimat){
        Alert::error('Maaf', $kalimat);
        return redirect()->back()->withInput();
    }

    public function index()
    {
        try {
            $tree_types = TreeType::orderBy('id', 'desc')->get();
            
            return view('admin.type', compact('tree_types'));
        }catch (Exception $e){
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

    public function updateImage(Request $request, $id)
    {
        $rules = [
            'image' => 'required|mimes:jpeg,png|max:5048|dimensions:max_width=80,max_height=80',
        ];

        Validator::make($request->all(), $rules, $messages = 
        [
            'image.required'    => 'gambar harus diisi',
            'image.mimes'       => 'format gambar harus berupa PNG atau JPEG',
            'image.max'         => 'maximal gambar adalah 5 mb',
            'image.dimensions'  => 'maximal panjang dan lebar gambar 80 x 80',
        ])->validate();

        try {
            DB::beginTransaction();

                $data = TreeType::where('id', $id)->first();

                if(Storage::disk('local')->exists('public/tree_type/ori_icon' . $data->ori_icon)){
                    Storage::delete('public/tree_type/ori_icon' . $data->ori_icon);
                }

                if(Storage::disk('local')->exists('public/tree_type/modif_icon' . $data->modif_icon)){
                    Storage::delete('public/tree_type/modif_icon' . $data->modif_icon);
                }
                
                $oriIconFile = $request->file('image');
                $oriIcon     = time() . '-' . $oriIconFile->getClientOriginalName();    
                Storage::putFileAs('public/tree_type/ori_icon', $oriIconFile, $oriIcon);
                
                Storage::disk('public')->makeDirectory('tree_type/modif_icon');
                $modifIcon     = time() . '-2x-' . $oriIconFile->getClientOriginalName();
                $path          = storage_path() . '/app/public/tree_type/modif_icon/'. $oriIcon;
                $modifIconFile = Image::make($oriIconFile->getRealPath())
                                        ->fit(40, 40)
                                        ->save($path, 80);

                $data->update([
                    'ori_icon'    => $oriIcon,
                    'modif_icon'  => $modifIcon,
                ]);

            DB::commit();

            Alert::success('Mantap', 'Gambar berhasil diupdate');
            return redirect()->back();
        }catch (Exception $e) {
            DB::rollback();
            return $this->error('Terjadi Kesalahan');
        }
    }
}
