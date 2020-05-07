<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contacto extends Model
{
    protected $table = "contacto";

    protected $fillable = ['usuario_id', 'estudiante_id', 'estado_id', 'created_at', 'updated_at'];

    public function scopelistadoEstudiantes($query){
        return $query->select('contacto.id','estudiantes.nombre', 'estudiantes.apellido', 'telefono_contacto', 'programas.programa', 'estado')
        ->join('estudiantes', 'contacto.estudiante_id', '=' , 'estudiantes.id')
        ->join('programas', 'estudiantes.id_programa', '=', 'programas.id')
        ->join('usuarios', 'contacto.usuario_id', '=', 'usuarios.id')
        ->join('estado', 'contacto.estado_id', '=', 'estado.id')
        ->where('estado.estado', 'NO CONTACTADO');

    }
}
