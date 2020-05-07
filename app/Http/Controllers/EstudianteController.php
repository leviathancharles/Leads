<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Programa;
use App\Models\Contacto;
use Illuminate\Support\Facades\Validator;

class EstudianteController extends Controller
{
    public function formularioRegistro(){

        $programas = Programa::all();

        return view('formulario', compact('programas'));
    }

    public function registrarEstudiante(Request $request){

        $validador = Validator::make($request->all(),
        [
            'nombre' => 'required',
            'apellido' => 'required',
            'email'    => 'required|email',
            'telefono' => 'required|int',
            'programa' => 'required|int'
            ]);
        if($validador->fails()){
            return redirect('/')->withErrors($validador);

        }else{


            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $email = $request->input('email');
            $telefono = $request->input('telefono');
            $programa = $request->input('programa');

            $buscarEmail = Estudiante::where('email', $email)->first();

            if(!empty($buscarEmail->id)){

                $buscarEmail->nombre = $nombre;
                $buscarEmail->apellido = $apellido;
                $buscarEmail->email = $email;
                $buscarEmail->telefono_contacto = $telefono;
                $buscarEmail->id_programa = $programa;
                $buscarEmail->update();


                $contacto = Contacto::where('estudiante_id', $buscarEmail->id)->first();
                $contacto->estado_id = 1;
                $contacto->update();

                $mensaje = "Se ha actualizado el registro";

            }else{

                    $estudiante = new Estudiante();
                    $estudiante->nombre = $nombre;
                    $estudiante->apellido = $apellido;
                    $estudiante->email = $email;
                    $estudiante->telefono_contacto = $telefono;
                    $estudiante->id_programa = $programa;
                    if($estudiante->save()){
                        $contacto = new Contacto();
                        $contacto->usuario_id = 1;
                        $contacto->estudiante_id = $estudiante->id;
                        $contacto->estado_id = 1;
                        if($contacto->save()){
                            $mensaje = "Gracias por inscribirte en el programa pronto nos pondremos en contacto contigo";
                        }else{
                            $mensaje = "El registro no se ha creado";
                        }

                    }else{
                            $mensaje = "El registro no se ha creado";
                    }

            }

            return back()->with(compact('mensaje'));

        }


    }
}
