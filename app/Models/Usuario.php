<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'apellido', 'email', 'contrasena', 'id_rol', 'created_at', 'updated_at'];
}
