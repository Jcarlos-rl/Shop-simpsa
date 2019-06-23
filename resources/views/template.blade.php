<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">    
    <title>Industriales Simpsa</title>
    <link rel="icon" href="{{ asset('favicon.png')}}" type="image/x-icon"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div class="container95" id="top">
        <div class="row margin-b0">
            <div class="col m6">
                <p class="hide-on-med-and-down"><i class="fas fa-phone"></i> Llamanos: 2222548894</p>
            </div>
            <div class="col m6">
                <p class="right hide-on-med-and-down"><i class="fas fa-envelope"></i> ventas@industrialessimpsa.com</p>
            </div>
        </div>
    </div>
    <div class="container95">
        <img src="{{ asset('images/logo1.png')}}" class="img-logo" alt="">
    </div>
    <div class="">
        <nav class="white">
            <div class="container95">
                <div class="nav-wrapper">
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
                    <ul class="left hide-on-med-and-down">
                    <li class="nav-li"><a href="{{route('Inicio')}}" class="font-corporativa nav-text {{request()->is('/') ? 'active1' : 'black-text'}}">Inicio</a></li>
                        <li class="nav-li"><a href="#" class="font-corporativa nav-text dropdown-trigger active1 {{request()->is('Catalogo') || request()->is('Contacto') || request()->is('/') || request()->is('Cart/Show') ?  'active2' : 'white-text'}}" data-target='dropdown1'>Productos</a></li>
                        <li class="nav-li"><a href="{{route('Catalogo')}}" class="font-corporativa nav-text {{request()->is('Catalogo') ? 'active1' : 'black-text'}}">Catalogos</a></li>
                        <li class="nav-li"><a href="{{route('Contacto')}}" class="font-corporativa nav-text {{request()->is('Contacto') ? 'active1' : 'black-text'}}">Contacto</a></li>
                    </ul>
                    <ul class="right nav-size">
                    <li class="nav-size"><a href="{{route('Cart-Show')}}" class="black-text"><i class="material-icons left">shopping_cart</i><span class="new badge" style="margin-left:-20px; margin-top: 5px; position:absolute">{{$count}}</span></a></li>
                    </ul>                  
                </div>
            </div>
        </nav>
    </div>
    <ul class="sidenav" id="mobile-demo">
        <li class="nav-li"><a href="index.html" class="white-text font-corporativa nav-text {{request()->is('/') ? 'active1' : 'black-text'}}">Inicio</a></li>
        <li class="nav-li"><a href="https://simpsa-industrial.myshopify.com/collections/all" class="black-text font-corporativa nav-text">Productos</a></li>
        <li class="nav-li"><a href="vistas/catalogos.html" class="font-corporativa nav-text {{request()->is('Catalogo') ? 'active1' : 'black-text'}}">Catalagos</a></li>
        <li class="nav-li"><a href="vistas/contacto.html" class="font-corporativa nav-text {{request()->is('Contacto') ? 'active1' : 'black-text'}}">Contacto</a></li>
    </ul>
    <ul id='dropdown1' class='dropdown-content'>
        <li><a href="{{route('Producto-Marca',['BGS'])}}">BGS</a></li>
        <li><a href="{{route('Producto-Marca',['URREA'])}}">URREA</a></li>
    </ul>

    @yield('seccion')

    <footer class="page-footer background-corporativo">
        <!--<div class="container">
            <div class="row">
            <div class="col l6 s12">
                
            </div>
            <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Aceptamos</h5>
                <img src="vistas/images/american_express.svg" alt="">
                <img src="vistas/images/master.svg" alt="">
                <img src="vistas/images/paypal.svg" alt="">
                <img src="vistas/images/visa.svg" alt="">
            </div>
            </div>
        </div>-->
        <div class="footer-copyright">
            <div class="container">
            © 2019 Copyright 
            <div class="right">
                <img src="{{ asset('images/american_express.svg')}}">
                <img src="{{ asset('images/master.svg')}}">
                <img src="{{ asset('images/paypal.svg')}}">
                <img src="{{ asset('images/visa.svg')}}">
            </div>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="{{ asset('js/materialize.js')}}"></script>
</body>
</html>