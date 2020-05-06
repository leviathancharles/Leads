<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = "estudaintes";

    protected $fillable = ['nombre', 'apellido', 'email', 'telefono_contacto', 'id_programa', 'created_at', 'updated_at'];
}
