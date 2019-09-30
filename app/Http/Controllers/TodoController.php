<?php

namespace App\Http\Controllers;
use App\ModelTodo;
use Illuminate\Http\Request;
class TodoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index(){
        $data = ModelTodo::all();
        return response($data);
    }
  
    public function show($id){
        $data = ModelTodo::where('id',$id)->get();
        $tidak = 'Data tidak ditemukan';
        if(isset($data) && count($data) > 0) {  
            return response ($data);
        } else {  
            return response ($tidak);
        }
    }

    public function store (Request $request){
        $data = new ModelTodo();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response('Berhasil Tambah Data');
    }

    public function update(Request $request, $id){
        $data = ModelTodo::where('id',$id)->first();
        $data->activity = $request->input('activity');
        $data->description = $request->input('description');
        $data->save();
    
        return response('Berhasil Merubah Data');
    }
    
    public function destroy($id){
        $data = ModelTodo::where('id',$id)->first();
        $data->delete();
    
        return response('Berhasil Menghapus Data');
    }
}