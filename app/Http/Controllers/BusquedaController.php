<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;
use App\Models\Tipomaterial;
use App\Models\Repositorio;
use Illuminate\Support\Facades\DB;
class BusquedaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $tipomateriales = Tipomaterial::all();
        $coordinaciones = Rol::all();
        return view ('repositorio.find',
        compact('tipomateriales','coordinaciones'));
      
     
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
       $tema= $request->tema??"";
       $tema = "%$tema%";
       $titulo = $request->titulo??"";
       $titulo = "%$titulo%";
       $anio = $request->anio==-1?"":$request->anio;
       $anio = "%$anio%";
       $mes = $request->mes==-1?"":$request->mes;
       $mes = "%$mes%";
       $tipo = $request->tipo==-1?"":$request->tipo;
       $tipo = "%$tipo%";
       $coordinacion = $request->coordinacion==-1?"":$request->coordinacion;
       $coordinacion = "%$coordinacion%";
       
       $sql ="SELECT * FROM repositorio r INNER JOIN (repotema rt 
       INNER JOIN tema t ON rt.tema_id=t.id) 
       ON rt.repositorio_id = r.id 
       INNER JOIN detallerepo dr ON dr.repositorio_id=r.id 
       INNER JOIN (usuario u  INNER JOIN usuariorol ur ON ur.usuario_id=u.id)
       ON u.id=r.usuario_id 
       WHERE upper(trim(t.descripcion)) like upper(trim(:tema)) and
        dr.material_id like :tipo or
        upper(trim(r.documento)) like upper(trim(:titulo)) and
        month(r.fecha) like :mes AND
        year(r.fecha) like :anio AND
        ur.rol_id like :coordinacion";


        $parameters= ['tema'=> $tema,
            'tipo'=> $tipo ,
            'titulo'=> $titulo,
            'mes'=> $mes ,
            'anio'=> $anio ,
          'coordinacion'=> $coordinacion 
        ];
       
      //  echo ("se recibieron datos"); exit;

       
     
        $query=DB::raw($sql);
        $repositorios= DB::select(DB::raw($sql),$parameters);
        //dd ($repositorios); exit;
       // dd($repositorios); exit; 

        return view ('repositorio.show', compact('repositorios'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
