@extends('template')

@section('seccion')
    @if(session()->get('success'))
        <div class="alert alert-success" id="agregado">
            {{ session()->get('success') }}  
        </div>
    @endif
    <div class="slider">
        <ul class="slides">
        <li>
            <img src="https://lorempixel.com/580/250/nature/1"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="https://lorempixel.com/580/250/nature/2"> <!-- random image -->
            <div class="caption left-align">
                <h3>Left Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="https://lorempixel.com/580/250/nature/3"> <!-- random image -->
            <div class="caption right-align">
                <h3>Right Aligned Caption</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        <li>
            <img src="https://lorempixel.com/580/250/nature/4"> <!-- random image -->
            <div class="caption center-align">
                <h3>This is our big Tagline!</h3>
                <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
            </div>
        </li>
        </ul>
    </div>
    <div class="spacing50"></div>
    <div class="container95">
        <div class="row">
            <div class="col m4 pro-mes">
                <br>
                <h4 class="center font-corporativa text-color-corporativo">Productos del mes</h4>
                @foreach ($Producto as $producto)
                    @if($producto->posicion == 1)
                        <h5 class="center multi">{{$producto->nombre}}</h5>
                        <div class="container">
                            <div class="producto">
                                <img src="images/producto/{{$producto->id.'.jpg'}}" class="responsive-img image" alt="">
                                <div class="info">
                                    <a href="{{route('Detalles',$producto->id)}}" class="btn waves-effect white-text background-corporativo ver">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <h4 class="text-color-corporativo-oscura multi center">{{'$'.$producto->precio}}</h4>
                        <div class="center">
                            <a href="{{route('Cart-Add',[$producto->id,1])}}" class="btn waves-effect background-corporativo">Comprar</a>
                        </div>
                        <br>
                    @endif
                @endforeach
            </div>
            <div class="col m8">
                <div class="row">
                    <h3 class="center font-corporativa text-color-corporativo margin-b0">LO MÁS VENDIDO</h3>
                    <p class="center multi gris margin-t0">CONOCE NUESTROS PRODUCTOS MÁS VENDIDOS</p>
                    <br>
                    @foreach ($Producto as $producto)
                        @if ($producto->posicion == 2)
                            <div class="col m4">
                                <div class="container">
                                    <div class="producto">
                                        <img src="images/producto/{{$producto->id.'.jpg'}}" class="responsive-img image" alt="">
                                        <div class="info">
                                            <a href="{{route('Cart-Add',[$producto->id,1])}}" class="btn waves-effect background-corporativo">Comprar</a>
                                            <a href="{{route('Detalles',$producto->id)}}" class="btn waves-effect white-text background-corporativo ver">Ver más</a>
                                        </div>
                                    </div>
                                </div>
                                <h6 class="center gris multi">{{$producto->marca}}</h6>
                                <h6 class="gris center">{{$producto->nombre}}</h6>
                                <div>
                                    <h5 class="text-color-corporativo-oscura multi center">{{'$'.$producto->precio}}</h5>
                                </div>
                                <div class="hide-on-med-and-up spacing20"></div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container95">
        <div class="row">
            <div class="col s12 m7 background-gris background-simpsa spacing500">
                <div class="row">
                    <br>
                    <h3 class="font-corporativa center">Industriales Simpsa</h3>
                    <div class="spacing50"></div>
                    <div class="col m8">
                        <h5 class="multi">Los <span class="text-color-corporativo">productos</span> de nuestra tienda son la perfecta combinación de <span class="text-color-corporativo">fiabilidad</span> y <span class="text-color-corporativo">durabilidad</span> verdadera.</h5>
                    </div>
                    <div class="col m4"></div>
                </div>
                <br>
                <div class="spacing50"></div>
                <div class="">
                    <a href="https://simpsa-industrial.myshopify.com/collections/all" class="btn waves-effect white-text background-corporativo">Ver todos los productos</a>
                </div>
                <br>
            </div>
            <div class="col s12 m5 ">
                <div class="marcas">
                    <div class="center">
                        <img src="images/Logo-BGStechnic.png" class="responsive-img width35 padding-t20" alt="">
                    </div>
                    <br>
                    <h6 class="margin-t0 justify multi padding-lr">BGS es una empresa líder de distribución de herramienta profesional automotriz. Actualmente contamos con más de 2700 productos en inventario en México.</h6>
                    <div class="center">
                        <a href="https://simpsa-industrial.myshopify.com/collections/bgs" class="btn waves-effect white-text background-corporativo">Ver productos</a>
                    </div>
                </div>
                <div class="spacing20"></div>
                <div class="marcas">
                    <br>
                    <div class="center">
                        <img src="images/Loctite-Logo.png" class="responsive-img width50" alt="">
                    </div>
                    <h6 class="justify multi padding-lr">LOCTITE® es la marca líder mundial en adhesivos, selladores y productos para el tratamiento de superficies. Con una tecnología de lo más avanzada.</h6>
                    <div class="center">
                        <a href="https://simpsa-industrial.myshopify.com/collections/loctite" class="btn waves-effect white-text background-corporativo">Ver productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container95 background-gris spacing50">
        <h5 class="font-corporativa padding-oferta">Productos en oferta</h5>
    </div>
    <br>
    <div class="container95">
        <div class="row">
            @foreach ($Producto as $producto)
                @if ($producto->posicion == 3)
                    <div class="col m3 s12">
                        <div class="row">
                            <div class="col m5 s12">
                                <br>
                                <img src="images/producto/{{$producto->id.'.jpg'}}" class="responsive-img" alt="">
                            </div>
                            <div class="col m7 s12">
                                <p class="center multi">{{$producto->nombre}}</p>
                                <h6 class="center multi red-text"><span class="gris line">{{'$'.$producto->precio*1.15}}</span>{{'$'.$producto->precio}}</h6>
                                <div class="center">
                                    <a href="{{route('Cart-Add',[$producto->id,1])}}" class="btn waves-effect background-corporativo">Comprar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif                
            @endforeach
        </div>
    </div>
    <div class="spacing50"></div>
    <div class="container95 pro-mes">
        <div class="row">
            <form action="{{route('Newsletter')}}">
                <div class="col m5 s12">
                    <h5 class="font-corporativa center">SUSCRÍBETE A NUESTRO BOLETÍN DE NOTICIAS</h5>
                    <div class="row">
                        @csrf
                        <div class="input-field col s12 center">
                            <input placeholder="ejemplo@mail.com" id="disabled" type="text" class="validate news" name="email" required>
                        </div>
                    </div>
                    <div class="center">
                        <button class="btn waves-effect white-text background-corporativo">Suscribirse</button>
                    </div>
                </div>
                <div class="col m5 s12">
                    <h5 class="font-corporativa center">Directamente a tu bandeja de entrada</h5>
                    <br>
                    <h6 class="center multi gris">¿Que deseas recibir? (Requerido)</h6>
                    <br>
                    <div class="center">
                        <div class="row">
                            <div class="col m4 s12">
                                <label class="label-form">
                                    <input type="checkbox" value="1" name="promociones">
                                    <span class="span-form">Promociones</span>
                                </label>
                            </div>
                            <div class="col m4 s12">
                                <label class="label-form">
                                    <input type="checkbox" value="1" name="nuevos">
                                    <span class="span-form">Nuevos Productos</span>
                                </label>
                            </div>
                            <div class="col m4 s12">
                                <label  class="label-form">
                                    <input type="checkbox" value="1" name="ofertas">
                                    <span class="span-form">Ofertas</span>
                                </label>
                            </div>
                        </div>
                        <p>
                        </p>
                    </div>
                </div>
            </form>
            <div class="col m2 s12">
                <h5 class="font-corporativa center">SÍGUENOS</h5>
                <div class="spacing20"></div>
                <div class="row">
                    <div class="col m6 s6">
                        <div class="center facebook">
                            <a href="https://www.facebook.com/simpsaindustrial/" class="waves-effect background-corporativo btn"><i class="fab fa-facebook-f"></i></a>
                        </div>
                    </div>
                    <div class="col m6 s6">
                        <div class="center instagram">
                            <a href="https://www.instagram.com/simpsaindustrial/" class="waves-effect background-corporativo btn"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <script>
        setTimeout(function() { 
            $('#agregado').fadeOut('fast'); 
        }, 5000);
    </script>
@endsection