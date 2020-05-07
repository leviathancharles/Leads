<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Programa;
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
            'email'    => 'required|unique:estudiantes|email',
            'telefono' => 'required|int',
            'programa' => 'required|int'
            ]);
        if($validador->fails()){
            return redirect('/')
            ->withErrors($validador);

        }else{
            $nombre = $request->input('nombre');
            $apellido = $request->input('apellido');
            $email = $request->input('email');
            $telefono = $request->input('telefono');
            $programa = $request->input('programa');

            $estudiante = new Estudiante();
            $estudiante->nombre = $nombre;
            $estudiante->apellido = $apellido;
            $estudiante->email = $email;
            $estudiante->telefono_contacto = $telefono;
            $estudiante->id_programa = $programa;
            $estudiante->save();
        }


    }
}
