<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class ProductoController extends Controller
{
    public function index()
    {
        $Producto = Producto::all();

        return view('Producto/index', compact('Producto'));
    }

    public function create()
    {
        return view('Producto/create');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nombre' => 'required|max:255',
            'marca' => 'required|max:255',
            'descripcion' => 'max:10000',
            'datostecnicos' => 'max:10000',
            'codigo' => 'required',
            'peso' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'posicion' => 'required|numeric',
            'seccion' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Producto::create($validateData);

        $imageName = $product->id.'.jpg';

        request()->image->move(public_path('images/producto'), $imageName);

        return redirect('/productos')->with('success','Producto guardado');
    }

    public function show($id)
    {
        /*$productos = Producto::find($id);
        return view('detalles', compact('productos'));*/
    }

    public function edit($id)
    {
        $productos = Producto::findOrFail($id);

        return view('Producto/edit', compact('productos'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nombre' => 'required|max:255',
            'marca' => 'required|max:255',
            'descripcion' => 'max:1000',
            'datostecnicos' => 'max:1000',
            'codigo' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
            'seccion' => 'required',
        ]);
        Producto::whereId($id)->update($validateData);

        return redirect('/productos')->with('success','Producto actualizado');
    }

    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return redirect('/productos')->with('success','Producto eliminado');
    }
}
