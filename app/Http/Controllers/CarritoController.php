<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Producto;


class CarritoController extends Controller
{
    public function __construct()
	{
		if(!\Session::has('cart')) \Session::put('cart', array());
	}

    public function show()
    {
		$cart = \Session::get('cart');
		$info = \Session::get('info');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }
        return view('carrito', compact('cart','info','count'));   
    }

    public function add(Producto $producto, $quantity)
    {
    	$cart = \Session::get('cart');
    	$producto->quantity = $quantity;
    	$cart[$producto->id] = $producto;
    	\Session::put('cart', $cart);

    	return redirect()->back()->with('success','Producto Agregado al Carrito');
    }

    public function delete(Producto $producto)
    {
    	$cart = \Session::get('cart');
    	unset($cart[$producto->id]);
    	\Session::put('cart', $cart);

    	return redirect()->route('Cart-Show');
    }

    public function update(Producto $producto, $quantity)
    {
    	$cart = \Session::get('cart');
    	$cart[$producto->id]->quantity = $quantity;
    	\Session::put('cart', $cart);

    	return redirect()->route('Cart-Show');
    }

    public function trash()
    {
		\Session::forget('info');
		\Session::forget('billing');
    	\Session::forget('cart');

    	return redirect()->route('Cart-Show');
    }
}
