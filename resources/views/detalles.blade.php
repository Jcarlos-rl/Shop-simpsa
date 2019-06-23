@extends('template')

@section('seccion') 
    <section class="seccion">
        <div class="container">
            <p class="multi">Inicio / {{$productos->seccion}} / {{$productos->nombre}}</p>
        </div>
    </section>
    @if(session()->get('success'))
        <div class="alert alert-success" id="agregado">
            {{ session()->get('success') }}  
        </div>
        <br/>
    @endif 
    <br>
    <br>
    <div class="container">
        <div class="row">
            <div class="col m5">
                <img src="{{asset('images/producto/'.$productos->id.'.jpg')}}" class="responsive-img" alt="">
            </div>
            <div class="col m1"></div>
            <div class="col m6">
                <h3 class="multi">{{$productos->nombre}}</h3>
                @if ($productos->posicion == 3)
                    <h4 class="multi red-text"><span class="gris line">{{'$'.$productos->precio*1.15}}</span>{{'$'.$productos->precio}}</h4>
                @else
                    <h4 class="multi">${{number_format($productos->precio,2)}}</h4>
                @endif
                <br>
                <h6 class="multi">Marca: {{$productos->marca}}</h6>
                <h6 class="multi">Codigo: {{$productos->codigo}}</h6>
                <br>
                <div class="row">
                    <div class="col m3">
                        <h5 class="multi">Cantidad:</h5>
                    </div>
                    <div class="col m4">
                        <div class="number-input">
                            <input type="number" value="1" min="1" name="cantidad" id="producto_{{$productos->id}}">
                        </div>
                    </div>
                </div>
                <a href="#" class="btn green btn-add-item" data-id="{{$productos->id}}">Agregar a carrito</a>
            </div>
        </div>
    </div>
    <div class="spacing100"></div>
    <div class="container">
        <div class="row">
            <div class="col m6">
                <h5>Descripción</h5>
                <hr>
                @if ($productos->descripcion == null)
                    Producto sin descripción 
                @else
                    <p>{!!$productos->descripcion!!}</p>
                @endif
            </div>
            @if ($productos->datostecnicos != null)
                <div class="col m6">
                    <h5>Datos Técnicos</h5>
                    <hr>
                    <p>{!!$productos->datostecnicos!!}</p>
                </div>
            @endif
        </div>
        <br>
        <h4 class="center font-corporativa">Productos en oferta</h4>
        <br>
        <div class="row">
            @foreach ($oferta as $ofertas)
                <div class="col m4">
                    <div class="container">
                        <div class="producto">
                            <img src="{{asset('images/producto/'.$ofertas->id.'.jpg')}}" class="responsive-img image" alt="">
                            <div class="info">
                                <a href="#" class="btn waves-effect white-text background-corporativo">Comprar</a>
                                <a href="{{route('Detalles',$ofertas->id)}}" class="btn waves-effect white-text background-corporativo ver">Ver más</a>
                            </div>
                        </div>
                    </div>
                    <h6 class="center gris multi">{{$ofertas->marca}}</h6>
                    <h6 class="multi center">{{$ofertas->nombre}}</h6>
                    <div>
                        <h5 class="center multi red-text"><span class="gris line">{{'$'.$ofertas->precio*1.15}}</span>{{'$'.$ofertas->precio}}</h5>
                    </div>
                    <div class="hide-on-med-and-up spacing20"></div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h4>Modal Header</h4>
            <p>A bunch of text</p>
        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
        </div>
    </div>
    <script>
        setTimeout(function() { 
            $('#agregado').fadeOut('fast'); 
        }, 5000);

    </script>
@endsection