@extends('template')

@section('seccion')
    @if(session()->get('success'))
        <div class="alert alert-success" id="agregado">
            {{ session()->get('success') }}  
        </div>
    @endif
    <br>
    <div class="container95">
        <div class="row">
            <div class="col m3">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>{{$categoria}}</h4></li>
                    <a href="{{route('Producto-Categoria',[$marca,$categoria,$subcategoria])}}" class="collection-item active">{{$subcategoria}}</a>
                    @foreach ($subcategorias as $item)
                        @if ($item->nombre != $subcategoria)
                            <a href="{{route('Producto-Categoria',[$marca,$categoria,$item->nombre])}}" class="collection-item">{{$item->nombre}}</a>
                        @endif                        
                    @endforeach
                </ul>
            </div>
            <div class="col m9">
                <div class="spacing50"></div>
                @foreach ($productos as $producto)
                    <div class="col m4">
                        <div class="container">
                            <div class="producto">
                                <img src="{{asset('images/producto/'.$producto->id.'.jpg')}}" class="responsive-img image" alt="">
                                <div class="info">
                                    <a href="{{route('Cart-Add',[$producto->id,1])}}" class="btn waves-effect background-corporativo">Comprar</a>
                                    <a href="{{route('Detalles',$producto->id)}}" class="btn waves-effect white-text background-corporativo ver">Ver más</a>
                                </div>
                            </div>
                        </div>
                        <h5 class="center gris font-corporativa">{{$producto->marca}}</h5>
                        <h5 class="font-corporativa center">{{$producto->nombre}}</h5>
                        <div>
                            <h5 class="text-color-corporativo-oscura font-corporativa center">{{'$'.$producto->precio}}</h5>
                        </div>
                        <div class="hide-on-med-and-up spacing20"></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection