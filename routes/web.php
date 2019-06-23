<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','PageController@Inicio')->name('Inicio');
Route::get('/Catalogo','PageController@Catalogo')->name('Catalogo');
Route::get('/Contacto','PageController@Contacto')->name('Contacto');
Route::get('/Detalles/{id}','PageController@Detalles')->name('Detalles');


Route::resource('productos','ProductoController');
Route::resource('carrito','CarritoController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*---------Paypal--------*/
Route::get('payment', array(
    'as' => 'payment',
    'uses' => 'PaypalController@postPayment',
));

Route::get('payment/status', array(
	'as' => 'payment.status',
	'uses' => 'PaypalController@getPaymentStatus',
));
/*-----------Carrito---------- */

Route::bind('productos', function($id){
    return App\Producto::where('id', $id)->first();
});

Route::get('Cart/Show', array(
    'as' => 'Cart-Show',
    'uses' => 'CarritoController@show',
));

Route::get('Buyer', array(
    'as' => 'Buyer',
    'uses' => 'BuyerController@store',
));

Route::get('Billing', array(
    'as' => 'Billing',
    'uses' => 'BuyerController@factura',
));

Route::get('Cart/Billing', array(
    'as' => 'Cart-Billing',
    'uses' => 'BuyerController@billing',
));

Route::get('Cart/Payment', array(
    'as' => 'Cart-Payment',
    'uses' => 'BuyerController@payment',
));

Route::get('Cart/Add/{producto}/{cantidad}', [
	'as' => 'Cart-Add',
	'uses' => 'CarritoController@add'
]);

Route::get('Cart/Delete/{producto}',[
	'as' => 'Cart-Delete',
	'uses' => 'CarritoController@delete'
]);

Route::get('Cart/Trash', [
	'as' => 'Cart-Trash',
	'uses' => 'CarritoController@trash'
]);

Route::get('Cart/Update/{producto}/{cantidad}', [
	'as' => 'Cart-Update',
	'uses' => 'CarritoController@update'
]);

Route::get('Cart/Finish',[
	'as' => 'Cart-Finish',
	'uses' => 'BuyerController@finish',
]);

/*-------------------Info-----------------------*/
Route::get('Info/Show', array(
    'as' => 'Info-Show',
    'uses' => 'BuyerController@info',
));

/* newsletter */
Route::get('/Newsletter',[
    'as' => 'Newsletter',
    'uses' => 'PageController@Newsletter',
]);

/* Contacto */
Route::get('/ContactoSimpsa',[
    'as' => 'Contacto-Simpsa',
    'uses' => 'PageController@ContactoSimpsa',
]);

/* Productos*/

Route::get('Productos/{marca}',[
    'as' => 'Producto-Marca',
    'uses' => 'PageController@Marca',
]);

Route::get('Productos/{marca}/{categoria}/{subcategoria}',[
    'as' => 'Producto-Categoria',
    'uses' => 'PageController@Categoria',
]);
