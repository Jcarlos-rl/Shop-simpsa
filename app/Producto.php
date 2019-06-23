<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = ['nombre', 'marca','descripcion','datostecnicos','codigo','peso', 'precio','stock','seccion','posicion'];
}
