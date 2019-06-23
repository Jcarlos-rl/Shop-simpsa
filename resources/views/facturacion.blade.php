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
                            <hr>
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
                        @if ($billing!=null)
                        <form action="{{ route('Billing') }}">
                            <div class="row">
                                <div class="input-field col m6">
                                    @csrf
                                    <input placeholder="Nombre o Razón social" value="{{$billing['nombre']}}" name="nombre" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m6">
                                    <input placeholder="RFC" id="first_name" value="{{$billing['RFC']}}" name="RFC" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Dirección" value="{{$billing['direccion']}}" name="direccion" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Ciudad" value="{{$billing['ciudad']}}" name="ciudad" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Número interior, Departamento, etc." value="{{$billing['departamento']}}" name="departamento" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m4">
                                    <select name="pais">
                                        <option value="{{$billing['pais']}}" selected>{{$billing['pais']}}</option>
                                        <option value="México">México</option>
                                    </select>
                                    <label>País/Región</label>
                                </div>
                                <div class="input-field col m4">
                                    <select name="estado">
                                        <option value="{{$billing['estado']}}" selected>{{$billing['estado']}}</option>
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
                                    <input placeholder="Código postal" value="{{$billing['cp']}}" name="cp" id="first_name" type="text" class="validate">
                                </div>
                            </div>
                            <button class="btn green right">Continuar</button>
                        </form> 
                        @else 
                        <form action="{{ route('Billing') }}">
                            <div class="row">
                                <div class="input-field col m6">
                                    @csrf
                                    <input placeholder="Nombre o Razón social" name="nombre" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m6">
                                    <input placeholder="RFC" id="first_name" name="RFC" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Dirección" name="direccion" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Ciudad" name="ciudad" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m12">
                                    <input placeholder="Número interior, Departamento, etc." name="departamento" id="first_name" type="text" class="validate">
                                </div>
                                <div class="input-field col m4">
                                    <select name="pais">
                                        <option value="" disabled selected>Elige una opción</option>
                                        <option value="México">México</option>
                                    </select>
                                    <label>País/Región</label>
                                </div>
                                <div class="input-field col m4">
                                    <select name="estado">
                                        <option value="" disabled selected>Elige una opción</option>
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
                                    <input placeholder="Código postal" name="cp" id="first_name" type="text" class="validate">
                                </div>
                            </div>
                            <button class="btn green right">Continuar</button>
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