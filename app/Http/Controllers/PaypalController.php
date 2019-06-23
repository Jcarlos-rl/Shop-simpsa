<?php 

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Input;
use App\Order;
use App\OrderItem;
use App\InfoUser;
use App\Billing;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;


class PaypalController extends BaseController
{
	private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}

	public function postPayment()
	{
		$payer = new Payer();
		$payer->setPaymentMethod('paypal');

		$items = array();
		$subtotal = 0;
		$weight = 0;
		$cart = \Session::get('cart');
		$currency = 'MXN';

		foreach($cart as $producto){
			$item = new Item();
			$item->setName($producto->nombre)
			->setCurrency($currency)
			->setDescription($producto->descripcion)
			->setQuantity($producto->quantity)
			->setPrice($producto->precio);

			$items[] = $item;
			$subtotal += $producto->quantity * $producto->precio;
			$weight += $producto->quantity * $producto->peso;
		}

		/*if($subtotal>999){
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
		}*/
		$shipping = 0;

		$item_list = new ItemList();
		$item_list->setItems($items);

		$details = new Details();
		$details->setSubtotal($subtotal)
		->setShipping($shipping);

		$total = $subtotal + $shipping;

		$amount = new Amount();
		$amount->setCurrency($currency)
			->setTotal($total)
			->setDetails($details);

		$transaction = new Transaction();
		$transaction->setAmount($amount)
			->setItemList($item_list)
			->setDescription('Pedido de prueba en mi Laravel App Store');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(\URL::route('payment.status'))
			->setCancelUrl(\URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
			->setPayer($payer)
			->setRedirectUrls($redirect_urls)
			->setTransactions(array($transaction));

		try {
			$payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}

		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		\Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
			// redirect to paypal
			return \Redirect::away($redirect_url);
		}

		return \Redirect::route('Cart-Show')
			->with('error', 'Ups! Error desconocido.');

	}

	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = \Session::get('paypal_payment_id');

		// clear the session payment ID
		\Session::forget('paypal_payment_id');

		$payerId = \Input::get('PayerID');
		$token = \Input::get('token');

		//if (empty(\Input::get('PayerID')) || empty(\Input::get('token'))) {
		if (empty($payerId) || empty($token)) {
			return \Redirect::route('Cart-Payment')
				->with('success', 'Hubo un problema al intentar pagar con Paypal');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(\Input::get('PayerID'));

		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later

		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			// Registrar el Detalle del pedido  --- ok
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar

			$this->saveOrder(\Session::get('cart'),\Session::get('info'),\Session::get('billing'));

			\Session::forget('cart');
			\Session::forget('info');
			\Session::forget('billing');


			return \Redirect::route('Inicio')
				->with('success', 'Compra realizada de forma correcta');
		}
		return \Redirect::route('Inicio')
			->with('success', 'La compra fue cancelada');
	}

	private function saveOrder($cart,$info,$billing)
	{
	    $subtotal = 0;
	    foreach($cart as $item){
	        $subtotal += $item->precio * $item->quantity;
        }
        
        $email = $info['email'];
	    
	    $order = Order::create([
	        'subtotal' => $subtotal,
	        'shipping' => 100,
	        'email' => $email,
        ]);

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