<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


use App\Order;
use App\OrderItem;
use App\InfoUser;
use App\Billing;

use App\Mail\DemoEmail;

class BuyerController extends Controller
{
    public function __construct()
	{
        if(!\Session::has('info')) \Session::put('info', array());
        if(!\Session::has('billing')) \Session::put('billing', array());
    }
    public function info(){
        return \Session::get('info');
    }

    public function billing()
    {
        $info = \Session::get('info');
        if($info == NULL){
            return redirect()->back();
        }else if($info != null){
            $factura = $info['factura'];
            if($factura != 'Si'){
                return redirect()->route('Cart-Payment');
            }else{
                $cart = \Session::get('cart');
                $billing = \Session::get('billing');
                if($cart == NULL){
                    $count = 0;
                }else{
                    $count = count($cart);
                }
                return view('facturacion', compact('cart','billing', 'count')); 
            }
        }
    }

    public function payment()
    {
        $info = \Session::get('info');
        if($info == NULL){
            return redirect()->back();
        }else {
            $factura = $info['factura'];
            $billing = \Session::get('billing');
            if($factura == 'Si' && $billing == null){
                return redirect()->route('Cart-Billing');
            }else{
                $cart = \Session::get('cart');
                if($cart == NULL){
                    $count = 0;
                }else{
                    $count = count($cart);
                }
                $subtotal = $this->total();
                $weight = $this->weight();
                if($subtotal>999){
                    $shipping = 0;
                }else{
                    if($weight<1){
                        $shipping = 160;
                    }else if($weight>1 && $weight<7){
                        $shipping = 200;
                    }else if($weight>7 && $weight<14){
                        $shipping = 250;
                    } else{
                        $shipping = 300;
                    }
                }

                $total = $subtotal + $shipping;

                return view('pago', compact('cart', 'total', 'subtotal', 'shipping','count')); 
            }
        }
    }

    public function finish(){
        $this->saveOrder(\Session::get('cart'),\Session::get('info'),\Session::get('billing'));
        \Session::forget('cart');
        \Session::forget('info');
        \Session::forget('billing');
        return redirect()->route('Inicio')->with('success','Compra realizada con exito');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'email' => 'required',
            'nombre' => 'required|max:255',
            'apellidos' => 'required|max:255',
            'direccion' => 'required|max:500',
            'ciudad' => 'required|max:255',
            'departamento' => 'max:255',
            'pais' => 'required|max:255',
            'estado' => 'required|max:255',
            'cp' => 'required|numeric',
            'tel' => 'required|numeric',
            'factura' => 'required',
        ]);
        \Session::put('info', $validateData);

        $factura = $request->factura;

        if($factura == "No"){
            return redirect()->route('Cart-Payment');
        }else{
            return redirect()->route('Cart-Billing');
        }
    }
    public function factura(Request $request)
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
        \Session::put('billing', $validateData);

        return redirect()->route('Cart-Payment');
    }
    private function total()
    {
    	$cart = \Session::get('cart');
    	$total = 0;
    	foreach($cart as $item){
    		$total += $item->precio * $item->quantity;
    	}

    	return $total;
    }

    private function weight(){
        $cart = \Session::get('cart');
        $weight = 0;

        foreach($cart as $item){
            $weight += $item->peso * $item->quantity;
        }

        return $weight;
    }

    private function saveOrder($cart,$info,$billing)
	{
        $subtotal = 0;
        $weight = 0;
	    foreach($cart as $item){
            $subtotal += $item->precio * $item->quantity;
            $weight += $item->peso * $item->quantity;
        }

        if($subtotal>999){
            $shipping = 0;
        }else{
            if($weight<1){
                $shipping = 160;
            }else if($weight>1 && $weight<7){
                $shipping = 200;
            }else if($weight>7 && $weight<14){
                $shipping = 250;
            } else{
                $shipping = 300;
            }
        }
        
        $email = $info['email'];
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => $shipping,
	        'email' => $email,
        ]);

        $Num_Order = $order->id;

        $this->saveInfoUser($info);
        
        $this->sendMail($info,$Num_Order,$shipping,$subtotal);

        $factura = $info['factura'];

        if($factura == "Si"){
            $this->saveBilling($billing);
        }
	    
	    foreach($cart as $item){
	        $this->saveOrderItem($item, $order->id);
	    }
    }
    
    private function saveOrderItem($item, $order_id)
	{
		OrderItem::create([
			'cantidad' => $item->quantity,
			'id_producto' => $item->id,
			'id_order' => $order_id
		]);
    }
    
    private function saveInfoUser($info){
        $email = $info['email'];
        $nombre = $info['nombre'];
        $apellidos = $info['apellidos'];
        $direccion = $info['direccion'];
        $ciudad = $info['ciudad'];
        $departamento = $info['departamento'];
        $pais = $info['pais'];
        $estado = $info['estado'];
        $cp = $info['cp'];
        $tel = $info['tel'];

        $info = InfoUser::create([
            'email' => $email,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'departamento' => $departamento,
            'pais' => $pais,
            'estado' => $estado,
            'cp' => $cp,
            'tel' => $tel,
        ]);
    }

    private function saveBilling($billing){
        $nombre = $billing['nombre'];
        $rfc = $billing['RFC'];
        $direccion = $billing['direccion'];
        $ciudad = $billing['ciudad'];
        $departamento = $billing['departamento'];
        $pais = $billing['pais'];
        $estado = $billing['estado'];
        $cp = $billing['cp'];

        $info = Billing::create([
            'nombre' => $nombre,
            'rfc' => $rfc,
            'direccion' => $direccion,
            'ciudad' => $ciudad,
            'departamento' => $departamento,
            'pais' => $pais,
            'estado' => $estado,
            'cp' => $cp,
        ]);
    }

    public function sendMail($info,$Num_Order,$shipping,$subtotal){

        $total = $shipping + $subtotal;

        $email = $info['email'];
        $nombre = $info['nombre'];
        $apellidos = $info['apellidos'];
        $direccion = $info['direccion'];
        $ciudad = $info['ciudad'];
        $estado = $info['estado'];
        $cp = $info['cp'];
        $tel = $info['tel'];

        $demo = new \stdClass();
        $demo->email = $email;
        $demo->nombre = $nombre;
        $demo->apellidos = $apellidos;
        $demo->direccion = $direccion;
        $demo->ciudad = $ciudad;
        $demo->estado = $estado;
        $demo->cp = $cp;
        $demo->tel = $tel;
        $demo->envio = $shipping;
        $demo->subtotal = $subtotal;
        $demo->total = $total;
        $demo->orden = $Num_Order;
 
        Mail::to($email)->send(new DemoEmail($demo));
    }
}
