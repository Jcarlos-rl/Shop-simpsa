@extends('template')

@section('seccion')
    <div class="spacing50"></div>
    @if ($marca == 'BGS')    
        <div class="container95">
            <div class="center">
                <img class="responsive-img" width="200" src="{{ asset('images/Logo-BGStechnic.png')}}">
            </div>
            <div class="spacing50"></div>
            <div class="row">
                <div class="col m4">
                    <h6 class="center">HERRAMIENTA MANUAL</h6>
                    <ul>
                        @foreach ($subcategorias as $item)
                            @if ($item->categoria == 'HERRAMIENTA MANUAL')
                                <li><a href="{{route('Producto-Categoria',[$marca,'HERRAMIENTA MANUAL',$item->nombre])}}">{{$item->nombre}}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col m4">
                    <h6 class="center">HERRAMIENTA ESPECIAL</h6>
                    <ul>
                        @foreach ($subcategorias as $item)
                            @if ($item->categoria == 'HERRAMIENTA ESPECIAL')
                                <li><a href="{{route('Producto-Categoria',[$marca,'HERRAMIENTA ESPECIAL',$item->nombre])}}">{{$item->nombre}}</a></li>
                            @endif
                        @endforeach
                    </ul>   
                </div>
                <div class="col m4">
                    <h6 class="center">OTRAS</h6>
                    <ul>
                        @foreach ($subcategorias as $item)
                            @if ($item->categoria == 'OTRAS')
                                <li><a href="{{route('Producto-Categoria',[$marca,'OTRAS',$item->nombre])}}">{{$item->nombre}}</a></li>
                            @endif
                        @endforeach
                    </ul>     
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <div class="center">
                <h2 class="center multi">404</h2>
                <h3 class="multi">Ups! Lo sentimos.</h3>
                <h3 class="multi">Página no encontrada.</h3>
                <div class="spacing20"></div>
                <a class="multi" href="{{route('Inicio')}}">Haga click aquí</a> para continuar comprando.
                <div class="spacing50"></div>
            </div>
        </div> 
    @endif
@endsection