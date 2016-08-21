<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use App\MasterSoalModel;

class ProjectsController extends Controller {

    public function index()
    {
        return response()->json(true,200);
    }

    public function data()
    {
    	return MasterSoalModel::all()->take(10);
    }

    public function update($id = NULL ,Request $req)
    {    	
        $rules = [
            'name'    => 'required',
            'keterangan' => 'required',
            'type' => 'required',
        ];
        $message = [
            'name.required' => 'Harus di isi',
            'keterangan.required' => 'Harus di isi',
            'type.required' => 'Harus di isi',
        ];
        
        $this->validate($req->all(), $rules,$message);
        $update = MasterSoalModel::findOrFail($id)->update($req->all());
        if($update){
        	return response()->json(['message' => 'berhasil Update'],200);
        }
        return response()->json(['message' => 'gagal Update'],422);
    }

    public function delete($id = NULL)
    {
    	if(MasterSoalModel::delete($id)){
        	return response()->json(['message' => 'berhasil Menghapus'],200);
    	}
    	return response()->json(['message' => 'gagal Menghapus'],422);
    }

    public function create(Request $req)
    {
        $rules = [
            'name'    => 'required',
            'keterangan' => 'required',
            'type' => 'required',
        ];
        $message = [
            'name.required' => 'Harus di isi',
            'keterangan.required' => 'Harus di isi',
            'type.required' => 'Harus di isi',
        ];
        
        $this->validate($req, $rules,$message);
        $create = MasterSoalModel::create($req->all());
        if($create){
        	return response()->json(['message' => 'berhasil Create'],200);
        }
           return response()->json(['message' => 'gagal Create'],422);
    }
}
