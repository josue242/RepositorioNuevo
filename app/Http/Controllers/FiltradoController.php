<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FiltradoController extends Controller
{
    public function formularioBusqueda($id)
    {
        return view('View.filtrado', compact('id'));
     
    }
    public function filtradoRespuesta(Request $request)
    {
        // dd($request);
      //  $titulo = $request->titulo??"";
      //  $titulo = "%$titulo%";
      //  $id = $request->id??0;
      //  $id = "%$id%";
     
   
           //$sql ="SELECT * FROM repositorio r INNER JOIN detallerepo dr 
          //  ON dr.repositorio_id = r.id  
        // JOIN tipomaterial tp ON tp.id = dr.material_id
          //   INNER JOIN (usuario u  INNER JOIN usuariorol ur ON ur.usuario_id=u.id)
          //  ON u.id=r.usuario_id 
          //   WHERE
          //   dr.material_id = :id and 
          //  r.documento like :titulo 
            
          //  ";
            $sql= DB::table('repositorio as r')
            ->join('detallerepo as dr' , 'dr.repositorio_id', '=', 'r.id')
            ->join('tipomaterial as tp', 'tp.id', '=', 'dr.material_id')
            ->select('*')
            ->where('dr.material_id', '=',  $request->id )
            ->where('r.documento' , 'like', '%'.$request->titulo.'%')
            ->get();
         




      // $parameters =[
       //'titulo'=> $titulo,
       //'id'=> $id
        
       //];

       // $query=DB::raw($sql);
       // $repositorios = DB::select(DB::raw($sql));
       //  dd ($repositorios); exit;

        return view ('repositorio.showinicio', compact('sql'))->with('warning','no se encontro ninguna resultado.');
        //return view ('repositorio.show', compact('repositorios'));
        
    }
}
