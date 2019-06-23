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
                            <hr>
                        </div>
                        <div class="col m4">
                            <h5 class="center">Facturación</h5>
                        </div>
                        <div class="col m4">
                            <h5 class="center">Pago</h5>
                        </div>
                    </div>
                    <div class="container95">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <br/>
                        @endif
                        <h6>Información de contacto</h6>
                        @if ($info!=null)
                        <form action="{{ route('Buyer') }}">
                            <div class="row">
                                <div class="input-field col m12">
                                    @csrf
                                    <input placeholder="Correo electrónico"
                                    @if ($info['email']!=null)
                                        value="{{$info['email']}}"
                                    @endif
                                    name="email" id="first_name" type="text" class="validate">
                                </div>
                            </div>
                            <h6>Dirección de envío</h6>
                            <div class="row">
                                <div class="input-field col m6">
                                    <input placeholder="Nombre" 
                                    @if ($info['nombre']!=null)
                                        value="{{$info['nombre']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="nombre">
                                </div>
                                <div class="input-field col m6">
                                    <input placeholder="Apellidos" 
                                    @if ($info['apellidos']!=null)
                                        value="{{$info['apellidos']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="apellidos">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Dirección" 
                                    @if ($info['direccion']!=null)
                                        value="{{$info['direccion']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="direccion">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Ciudad"
                                    @if ($info['ciudad']!=null)
                                        value="{{$info['ciudad']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="ciudad">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Número interior, Departamento, etc." 
                                    @if ($info['departamento']!=null)
                                        value="{{$info['departamento']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="departamento">
                                </div>
                                <div class="input-field col m4">
                                    <select name="pais">
                                        <option 
                                        @if ($info['pais']!=null)
                                            value="{{$info['pais']}}"
                                        @endif
                                        selected>{{$info['pais']}}</option>
                                        <option value="México">México</option>
                                    </select>
                                    <label>País/Región</label>
                                </div>
                                <div class="input-field col m4">
                                    <select name="estado">
                                        <option
                                        @if ($info['estado']!=null)
                                            value="{{$info['estado']}}"
                                        @endif
                                         selected>{{$info['estado']}}</option>
                                        <option value="Aguascalientes">Aguascalientes</option>
                                        <option value="Baja California">Baja California</option>
                                        <option value="Baja California Sur">Baja California Sur</option>
                                        <option value="Campeche">Campeche</option>                                            
                                        <option value="Coahuila">Coahuila</option>
                                        <option value="Colima">Colima</option>
                                        <option value="Chiapas">Chiapas</option>
                                        <option value="Chihuahua">Chihuahua</option>
                                        <option value="Distrito Federal">Distrito Federal</option>
                                        <option value="Durango">Durango</option>
                                        <option value="Guanajuato">Guanajuato</option>
                                        <option value="Guerrero">Guerrero</option>
                                        <option value="Hidalgo">Hidalgo</option>
                                        <option value="Jalisco">Jalisco</option>
                                        <option value="México">México</option>
                                        <option value="Michoacán">Michoacán</option>
                                        <option value="Morelos">Morelos</option>
                                        <option value="Nayarit">Nayarit</option>
                                        <option value="Nuevo León">Nuevo León</option>
                                        <option value="Oaxaca">Oaxaca</option>
                                        <option value="Puebla">Puebla</option>
                                        <option value="Querétaro">Querétaro</option>
                                        <option value="Quintana Roo">Quintana Roo</option>
                                        <option value="San Luis Potosí">San Luis Potosí</option>                                                    
                                        <option value="Sinaloa">Sinaloa</option>
                                        <option value="Sonora">Sonora</option>
                                        <option value="Tabasco">Tabasco</option>
                                        <option value="Tamaulipas">Tamaulipas</option>
                                        <option value="Tlaxcala">Tlaxcala</option>
                                        <option value="Veracruz">Veracruz</option>
                                        <option value="Yucatán">Yucatán</option>
                                        <option value="Zacatecas">Zacatecas</option>
                                    </select>
                                    <label>Estado</label>
                                </div>
                                <div class="input-field col m4">
                                    <input placeholder="Código postal" 
                                    @if ($info['cp']!=null)
                                        value="{{$info['cp']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="cp">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Telefono" 
                                    @if ($info['tel']!=null)
                                        value="{{$info['tel']}}"
                                    @endif
                                    id="first_name" type="text" class="validate" name="tel">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col m6">
                                    <div class="input-field col m12">
                                        <select name="factura">
                                            <option 
                                            @if ($info['factura']!=null)
                                                value="{{$info['factura']}}"
                                            @endif
                                            selected>{{$info['factura']}}</option>
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                        <label>Deseo facturar mi compra</label>
                                    </div>
                                </div>
                                <div class="col m6">
                                    <button class="btn green right">Continuar</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="{{ route('Buyer') }}">
                                <div class="row">
                                    <div class="input-field col m12">
                                        @csrf
                                        <input placeholder="Correo electrónico" name="email" id="first_name" type="text" class="validate">
                                    </div>
                                </div>
                                <h6>Dirección de envío</h6>
                                <div class="row">
                                    <div class="input-field col m6">
                                        <input placeholder="Nombre" id="first_name" type="text" class="validate" name="nombre">
                                    </div>
                                    <div class="input-field col m6">
                                        <input placeholder="Apellidos" id="first_name" type="text" class="validate" name="apellidos">
                                    </div>
                                    <div class="input-field col m12">
                                        <input placeholder="Dirección" id="first_name" type="text" class="validate" name="direccion">
                                    </div>
                                    <div class="input-field col m12">
                                        <input placeholder="Ciudad" id="first_name" type="text" class="validate" name="ciudad">
                                    </div>
                                    <div class="input-field col m12">
                                        <input placeholder="Número interior, Departamento, etc." id="first_name" type="text" class="validate" name="departamento">
                                    </div>
                                    <div class="input-field col m4">
                                        <select name="pais">
                                            <option selected></option>
                                            <option value="México">México</option>
                                        </select>
                                        <label>País/Región</label>
                                    </div>
                                    <div class="input-field col m4">
                                        <select name="estado">
                                            <option selected></option>
                                            <option value="Aguascalientes">Aguascalientes</option>
                                            <option value="Baja California">Baja California</option>
                                            <option value="Baja California Sur">Baja California Sur</option>
                                            <option value="Campeche">Campeche</option>                                            
                                            <option value="Coahuila">Coahuila</option>
                                            <option value="Colima">Colima</option>
                                            <option value="Chiapas">Chiapas</option>
                                            <option value="Chihuahua">Chihuahua</option>
                                            <option value="Distrito Federal">Distrito Federal</option>
                                            <option value="Durango">Durango</option>
                                            <option value="Guanajuato">Guanajuato</option>
                                            <option value="Guerrero">Guerrero</option>
                                            <option value="Hidalgo">Hidalgo</option>
                                            <option value="Jalisco">Jalisco</option>
                                            <option value="México">México</option>
                                            <option value="Michoacán">Michoacán</option>
                                            <option value="Morelos">Morelos</option>
                                            <option value="Nayarit">Nayarit</option>
                                            <option value="Nuevo León">Nuevo León</option>
                                            <option value="Oaxaca">Oaxaca</option>
                                            <option value="Puebla">Puebla</option>
                                            <option value="Querétaro">Querétaro</option>
                                            <option value="Quintana Roo">Quintana Roo</option>
                                            <option value="San Luis Potosí">San Luis Potosí</option>                                                    
                                            <option value="Sinaloa">Sinaloa</option>
                                            <option value="Sonora">Sonora</option>
                                            <option value="Tabasco">Tabasco</option>
                                            <option value="Tamaulipas">Tamaulipas</option>
                                            <option value="Tlaxcala">Tlaxcala</option>
                                            <option value="Veracruz">Veracruz</option>
                                            <option value="Yucatán">Yucatán</option>
                                            <option value="Zacatecas">Zacatecas</option>
                                        </select>
                                        <label>Estado</label>
                                    </div>
                                    <div class="input-field col m4">
                                        <input placeholder="Código postal" id="first_name" type="text" class="validate" name="cp">
                                    </div>
                                    <div class="input-field col m12">
                                        <input placeholder="Telefono" id="first_name" type="text" class="validate" name="tel">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m6">
                                        <div class="input-field col m12">
                                            <select name="factura">
                                                <option selected></option>
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                            <label>Deseo facturar mi compra</label>
                                        </div>
                                    </div>
                                    <div class="col m6">
                                        <button class="btn green right">Continuar</button>
                                    </div>
                                </div>
                            </form>
                        @endif
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
                    <br>
                    <a href="{{route('Cart-Trash')}}" class="btn green">Vaciar carrito</a>
                    <div class="spacing20"></div>
                </div>
            </div>
        </div>        
    @else
    <div class="container">
        <div class="spacing50"></div>
        <div class="center">
            <i class="material-icons" style="font-size:80px">remove_shopping_cart</i>
            <div class="spacing20"></div>
            <h3 class="multi">Ups! Lo sentimos.</h3>
            <h3 class="multi">No tienes productos agregados al carrito.</h3>
            <div class="spacing20"></div>
            <a class="multi" href="{{route('Inicio')}}">Haga click aquí</a> para continuar comprando.
            <div class="spacing50"></div>
        </div>
    </div>        
    @endif
@endsection