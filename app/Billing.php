<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $fillable = ['nombre','rfc','direccion','ciudad','departamento','pais','estado','cp'];
}
