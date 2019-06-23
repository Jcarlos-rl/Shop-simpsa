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
            </div>
            <br/>
        @endif
        <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                <label for="exampleInputEmail1">Nombre</label>
                <input type="text" class="form-control" placeholder="Nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Marca</label>
                <input type="text" class="form-control" placeholder="Marca" name="marca">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Descripción</label>
                <textarea class="form-control" rows="3" name="descripcion"></textarea>
            </div>
            <div class="form-group">
                    <label for="exampleInputEmail1">Datos Tecnicos</label>
                    <textarea class="form-control" rows="3" name="datostecnicos"></textarea>
                </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Codigo</label>
                <input type="text" class="form-control" placeholder="Codigo" name="codigo">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Peso</label>
                <input type="text" class="form-control" placeholder="Peso" name="peso">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Precio</label>
                <input type="text" class="form-control" placeholder="Precio" name="precio">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Stock</label>
                <input type="text" class="form-control" placeholder="Stock" name="stock">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Sección</label>
                <input type="text" class="form-control" placeholder="Stock" name="seccion">
            </div>
            <select class="form-control" name="posicion">
                <option value="0">Por defecto</option>
                <option value="1">Producto del mes</option>
                <option value="2">Más vendido</option>
                <option value="3">Oferta</option>
            </select>
            <div class="form-group">
                <label for="exampleFormControlFile1">Example file input</label>
                <input type="file" class="form-control-file" name="image">
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
@endsection