<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Repositorio;
use App\Models\Tipomaterial;
use App\Models\Detallerepo;
use App\Models\Repotema;
use App\Models\Tema;
use Illuminate\Support\Facades\DB;
class DropzoneController extends Controller
{
    public function dropzone(){
        $tipomateriales = Tipomaterial::all();
        $tema = Tema::all();
        return view ('layouts.dropzone',
        compact('tipomateriales', 'tema'));

        
    }
    
    public function dropzoneStore(Request $request)
    {
        $image = $request->file('file');
       
        $imageName = time(). '.' .$image->extension();//
        $image->move(public_path('images'),$imageName);
       // return response()->json(['success'=>$imageName]);

        $campos=[
            'documento'        => $request->documento,
            'descripcion'   => $request->descripcion,
            'nomenclatura'  => $request->nomenclatura,
            'ubicacion'     => $request->ubicacion, 
            'fecha'=> date('Y-m-d'),
        ];
        $material_id= $request->tipo;
        $tema_id= $request->tema;
    
    DB::beginTransaction();
    try {
        $repositorio = Repositorio::create($campos);
        $detallerepo = [
            "repositorio_id"=>$repositorio->id,
            "material_id"=>$material_id,
            "cantidad"=>1
        ];
        $repotema = [
            "repositorio_id"=>$repositorio->id,
            "tema_id"=>$tema_id
            
        ];
      
        Detallerepo::create($detallerepo);
        Repotema::create($repotema);
        //...
        DB::commit();
    } catch(\Exception  $ex){
        $message = $ex->getMessage();

        DB::rollback();
        echo "$message"; exit;
    }

    return redirect("dropzone");

    }

    function validateData(Request $request)
    {/*
        $request->validate([
            'titulo' => 'required|max:200',
            'descripcion' => 'required'
        ]);*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    
}
