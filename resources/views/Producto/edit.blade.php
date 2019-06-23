@extends('layouts/app')

@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
              </ul>
            </div><br />
        @endif
        <form method="POST" action="{{ route('productos.update',$productos->id) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" value="{{$productos->nombre}}" name="nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" placeholder="Marca" value="{{$productos->marca}}" name="marca">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Descripción</label>
                <textarea class="form-control" rows="3" name="descripcion">{{$productos->descripcion}}</textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" value="{{$productos->codigo}}" name="codigo">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <input type="text" class="form-control" value="{{$productos->precio}}" name="precio">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="text" class="form-control" value="{{$productos->stock}}" name="stock">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sección</label>
                <input type="text" class="form-control" placeholder="Stock" value="{{$productos->seccion}}" name="seccion">
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
@endsection