@extends('template')

@section('seccion')
    <div class="spacing50"></div>
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
@endsection