<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Newsletter;
use App\SubCatagoria;
use DB;

class PageController extends Controller
{
    public function Inicio(){
        $Producto = Producto::all();
        $cart = \Session::get('cart');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }

        return view('inicio', compact('Producto','count'));
    }
    public function Catalogo(){
        $cart = \Session::get('cart');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }
        return view('catalogo', compact('count'));
    }
    public function Contacto(){
        $cart = \Session::get('cart');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }
        return view('contacto', compact('count'));
    }
    public function Detalles($id){
        $productos = Producto::find($id);
        $oferta = Producto::inRandomOrder()->paginate(3)
        ->where('posicion', '=', '3');
        $cart = \Session::get('cart');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }

        return view('detalles', compact('productos','oferta','count'));
    }

    public function Marca($marca){
        $subcategorias = SubCatagoria::all()
        ->where('marca','=',$marca);
        $cart = \Session::get('cart');
        if($cart == NULL){
            $count = 0;
        }else{
            $count = count($cart);
        }
        return view('marca', compact('subcategorias','marca','count'));
    }

    public function Categoria($marca,$categoria,$subcategoria){
        if($marca == 'BGS' || $marca == 'URREA'){
            $categorias = SubCatagoria::all()
            ->where('categoria','=',$categoria);
            if(count($categorias) != 0){
                $subcate = SubCatagoria::all()
                ->where('nombre','=',$subcategoria);
                if(count($subcate) !=0){
                    $subcategorias = SubCatagoria::all()
                    ->where('marca','=',$marca)
                    ->where('categoria','=',$categoria);
                    $cart = \Session::get('cart');
                    if($cart == NULL){
                        $count = 0;
                    }else{
                        $count = count($cart);
                    }

                    $productos = Producto::paginate(20)
                    ->where('seccion','=',$subcategoria);

                    return view('categoria', compact('productos','categoria','subcategorias','subcategoria','marca','count'));
                }else{
                    $cart = \Session::get('cart');
                    if($cart == NULL){
                        $count = 0;
                    }else{
                        $count = count($cart);
                    }
                    return view('notfound',compact('count'));
                }
            }else{
                $cart = \Session::get('cart');
                if($cart == NULL){
                    $count = 0;
                }else{
                    $count = count($cart);
                }
                return view('notfound',compact('count'));
            }
        }else{
            $cart = \Session::get('cart');
            if($cart == NULL){
                $count = 0;
            }else{
                $count = count($cart);
            }
            return view('notfound',compact('count'));
        }
    }
    
    public function sendMail($info,$Num_Order){

        $email = $info['email'];
        $nombre = $info['nombre'];

        $data = array(
            'email' => $email,
            'nombre' => $nombre,
            'orden' => $Num_Order,
        );

        Mail::send('emails.mail',$data,function($message) use ($info){
            $message->from('ventas@industrialessimpsa.com', 'Ventas Simpsa');

            $message->to($info['email'])->subject('Información para realizar tu tranferencia');
        });
    }

    public function ContactoSimpsa(Request $request){

        $data = array(
            'nombre' => $request->input('nombre'),
            'telefono' =>  $request->input('tel'),
            'email' => $request->input('email'),
            'tema' => $request->input('tema'),
            'mensaje' => $request->input('mensaje'),
        );

        \Mail::send('emails.contacto',$data,function($message) use ($request){
            $message->from('ventas@industrialessimpsa.com','Contacto Simpsa');

            $message->to('ventas@industrialessimpsa.com')->subject($request->input('tema'));
        });

        return redirect('/Contacto')->with('success','Gracias por contactarnos');
    }

    public function Newsletter(Request $request){
        $email = $request->input('email');
        $promociones = $request->input('promociones');
        $nuevos = $request->input('nuevos');
        $ofertas = $request->input('ofertas');
        
        $info = array(
            'email' => $email,
            'promociones' => $promociones,
            'nuevos' => $nuevos,
            'ofertas' => $ofertas,
        );

        $newsletter = Newsletter::create($info);
        return redirect('/')->with('success','Gracias por suscribirse a nuestro boletín');
    }
}
