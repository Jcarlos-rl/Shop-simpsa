<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoUser extends Model
{
    protected $fillable = ['email','nombre','apellidos','direccion','ciudad','departamento','pais','estado','cp','tel'];
}
