<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    protected $table = 'usuarios';

    protected $fillable = ['nombre', 'apellido', 'email', 'password', 'id_rol', 'created_at', 'updated_at'];

    use Notifiable;
}
