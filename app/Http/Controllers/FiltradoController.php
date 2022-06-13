<?php

namespace App\Http\Controllers;
use app\Http\Controllers\ZipController;
use App\Models\Repositorio;
use Illuminate\Http\Request;
use App\Models\Tipomaterial;
use File;
//use App\Http\Controllers\ZipArchive;

use ZipArchive;
use App\Models\Repotema;
use App\Models\Detallerepo;
use Illuminate\Cache\Repository;
use Illuminate\Support\Facades\DB;

class FiltradoController extends Controller
{
    public function formularioBusqueda($id)
    {
        $tipos = Repositorio::all();
        return view('View.filtrado', compact('id', 'tipos'));
    }
    public function filtradoRespuesta(Request $request)
    {

        $sql = DB::table('repositorio as r')
            ->join('detallerepo as dr', 'dr.repositorio_id', '=', 'r.id')
            ->join('tipomaterial as tp', 'tp.id', '=', 'dr.material_id')
            ->select('r.id', 'r.fecha', 'r.documento', 'r.file')
            ->where('dr.material_id', '=',  $request->id)
            ->where('r.documento', 'like', '%' . $request->titulo . '%')
            ->get();

            $id_usuario = session("usuario_id");
            //$id_usuario = $_SESSION['user'];
             
            $sql2="SELECT r.id,r.descripcion FROM rol r INNER JOIN usuariorol ur
            ON r.id=ur.rol_id 
            WHERE ur.usuario_id =:usuario";
            
            $query=DB::raw($sql2);
            //dd($query);
            $consulta= DB::select(DB::raw($sql2),['usuario'=>$id_usuario]);
        return view('repositorio.showinicio', compact('sql','consulta'))->with('esAdministrador',$this->isAdmin($consulta));
        //return view ('repositorio.show', compact('repositorios'));

    }
    private function isAdmin($filas){
        foreach ($filas as $fila){
            if (in_array( $fila->id, [1,2] )){
                return true;
            }
            
        }
        return false;
    }
    public function delete($id)
    {
        DB::beginTransaction();
        try {
            Repotema::where('repositorio_id', '=', $id)->delete();
            Detallerepo::where('repositorio_id', '=', $id)->delete();
            Repositorio::whereId($id)->delete();
            DB::commit();
        } catch (Exception $ex) {
            DB::rollBack();
            echo $ex->getMessage();
            exit;
        }
        return redirect('busqueda');
    }



    public function descarga($file){
        return response()->download(public_path(('images/'.$file)));
    }
    public function download($archivo)
    {

       // $zip = new ZipArchive;
        $documento = Repositorio::find($archivo);

        $files = explode("|", $documento->file);
        foreach ($files as $file) {

            $this->descarga($file);
          }



        /*$fileName = 'myNewFile.zip';
        if ($zip->open(public_path($fileName), ZipArchive::CREATE) === TRUE) {
            $files = File::files($files);
            foreach ($files as $key => $value) {

                $relativeNameInZipFile = basename($value);

                $zip->addFile($value, $relativeNameInZipFile);
            }
            $zip->close();
        }

*/

        

        // ( preg_split("/\|/",$archivo->file)
        //explode("|",$archivo);
        /*foreach( preg_split("/\|/", $archivo->file) as $doc){
       $doc= $archivo->file;

        }

       // dd ($archivo); exit();
       */

        //   return response()->download(public_path (('images/'.$archivo)), $archivo );
        
     


        //  ($documento->file);

    }
}
