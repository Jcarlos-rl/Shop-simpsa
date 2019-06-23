@extends('template')

@section('seccion')
    @if(session()->get('success'))
        <div class="alert alert-success" id="agregado">
            {{ session()->get('success') }}  
        </div>
    @endif
    @if (count($cart))
        <div class="container95">
            <br>
            <div class="row">
                <div class="col m7">
                    <div class="row">
                        <div class="col m4">
                            <h5 class="center">Información</h5>
                        </div>
                        <div class="col m4">
                            <h5 class="center">Facturación</h5>
                        </div>
                        <div class="col m4">
                            <h5 class="center">Pago</h5>
                            <hr>
                        </div>
                    </div>
                    <div class="container95">
                        <h6>Metodo de pago</h6>
                        <br>
                        
                        <p>
                            <label>
                                <input value="paypal" name="factura" type="radio" checked/>
                                <span>
                                    <img src="https://www.paypalobjects.com/webstatic/es_MX/mktg/logos-buttons/redesign/btn_10.png" alt="PayPal" />
                                </span>
                            </label>
                        </p>
                        <!--<p>
                            <label>
                                <input value="transferencia" name="factura" type="radio" checked/>
                                <span>Transferencia</span>
                            </label>
                        </p>
                        <br>-->
                        <button class="btn green right btn-fin-pedido">Finalizar pedido</button>
                        
                    </div>
                </div>
                <div class="col m5 pro-mes">
                    <h5>Resumen del Pedido</h5>
                    <div class="spacing20"></div>
                    <ul class="collapsible">
                        @foreach ($cart as $item)
                            <li>
                                <div class="collapsible-header">{{$item->nombre}}</div>
                                <div class="collapsible-body">
                                    <div class="row">
                                        <div class="col m6">
                                            <img src="{{asset('images/producto/'.$item->id.'.jpg')}}" class="responsive-img" alt="">
                                        </div>
                                        <div class="col m6">
                                            <div class="right">
                                                <a href="{{route('Cart-Delete', $item->id)}}"><i class="material-icons">close</i></a>
                                            </div>
                                            <br>
                                            <p>Cantidad:</p>
                                            <div class="number-input">
                                                <div class="row">
                                                    <div class="col m6">
                                                        <input type="number" value="{{$item->quantity}}" min="1" name="cantidad" id="producto_{{$item->id}}">
                                                    </div>
                                                    <div class="col m6">
                                                        <a href="#" class="btn-update-item" data-id="{{$item->id}}"><i class="material-icons">autorenew</i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <p>Subtotal: {{number_format($item->quantity*$item->precio,2)}}</p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                    <div class="container95">
                        <h6>Subtotal: <span class="right">{{number_format($subtotal,2)}}</span></h6>
                        <h6>Envio: <span class="right">{{number_format($shipping,2)}}</span></h6>
                        <hr>
                        <br>
                        <h5>Total: <span class="right">{{number_format($total,2)}}</span></h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>        
    @else
    <div class="container">
        <div class="spacing50"></div>
        <div class="center">
            <i class="material-icons" style="font-size:80px">remove_shopping_cart</i>
            <div class="spacing20"></div>
            <h3 class="font-corporativa">Ups! Lo sentimos.</h3>
            <h3>No tienes productos agregados al carrito.</h3>
            <div class="spacing20"></div>
            <a href="{{route('Inicio')}}">Haga click aquí</a> para continuar comprando.
            <div class="spacing50"></div>
        </div>
    </div>        
    @endif
@endsection