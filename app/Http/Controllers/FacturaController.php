<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function __construct()
	{
        if(!\Session::has('billing')) \Session::put('billing', array());
    }

    public function info(){
        return \Session::get('billing');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nombre' => 'required|max:255',
            'RFC' => 'required|max:255',
            'direccion' => 'required|max:500',
            'ciudad' => 'required|max:255',
            'departamento' => 'max:255',
            'pais' => 'required|max:255',
            'estado' => 'required|max:255',
            'cp' => 'required|numeric',
        ]);
        return \Session::put('billing', $validateData);
        //return redirect()->route('Info-Payment');

        //return redirect('/productos')->with('success','Producto guardado');
    }
}
