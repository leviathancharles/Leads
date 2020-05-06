<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Programa;

class EstudianteController extends Controller
{
    public function formularioRegistro(){

        $programas = Programa::all();

        return view('', compact($programas));
    }
}
