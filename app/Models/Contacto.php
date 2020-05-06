<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
    protected $table = "contacto";

    protected $fillable = ['usuario_id', 'estudiante_id', 'estado_id', 'created_at', 'updated_at'];
}
