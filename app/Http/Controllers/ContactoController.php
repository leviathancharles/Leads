<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Contacto;

class ContactoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function listadoGeneral(Request $request){
        $filtro = $request->input('filtro');
        if(empty($filtro)){
            $lista = Contacto::listadoEstudiantes()->get();
            if(count($lista) == 0){
                $data = [
                    'code'=>200,
                    'status' =>'vacio',
                    'mensaje' => 'No hay nuevos estudiantes inscritos',
                ];

            }else{
                $data = [
                    'code'=>200,
                    'status' => 'success',
                    'listado' => $lista
                ];

            }


        }else{
            $tipo = $request->input('tipo');
            if($tipo == "buscador"){
                $lista = Contacto::listadoEstudiantes()->where('estudiantes.nombre', 'like', '%' .$filtro. '%')->get();
                if(count($lista) == 0){
                    $data = [
                        'code'=>200,
                        'status' =>'vacio',
                        'mensaje' => 'No hay nadie inscrito con ese nombre',
                    ];

                }else{
                    $data = [
                        'code'=>200,
                        'status' => 'success',
                        'listado' => $lista
                    ];

                }

            }else{
                $lista = Contacto::listadoEstudiantes()->orderBy('estudiantes.nombre', $filtro)->get();
                if(count($lista) == 0){
                    $data = [
                        'code'=>200,
                        'status' =>'vacio',
                        'mensaje' => 'No hay nadie inscrito con ese nombre',
                    ];

                }else{
                    $data = [
                        'code'=>200,
                        'status' => 'success',
                        'listado' => $lista
                    ];

                }
            }


        }

        return response()->json($data, $data['code']);

        //return view('administradores.listado', compact('lista'));

    }

    public function actualizarContacto(Request $request){
        $valor = $request->input('valor');
        $contacto = Contacto::findOrFail($valor);
        $contacto->estado_id = 3;
        $contacto->update();

      //  foreach ($valores as $key => $valor) {
      //      $contacto = Contacto::findOrFail($valor);
      //      $contacto->estado_id = 3;
      //      $contacto->update();
      //  }

    }
}
