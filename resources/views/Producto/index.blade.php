@extends('layouts/app')

@section('content')
    <div class="container">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}  
            </div>
            <br/>
        @endif
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nombre</td>
                    <td>Descripcion</td>
                    <td>Codigo</td>
                    <td>Precio</td>
                    <td>Stock</td>
                    <td colspan="3">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($Producto as $producto)
                <tr>
                    @if($producto->codigo == 123)
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->codigo}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->stock}}</td>
                        <td><a href="{{ route('productos.show',$producto->id)}}" class="btn btn-primary">Ver</a></td>
                        <td><a href="{{ route('productos.edit',$producto->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('productos.destroy', $producto->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>

            <tbody>
                @foreach($Producto as $producto)
                <tr>
                    @if($producto->id == 1)
                        <td>{{$producto->id}}</td>
                        <td>{{$producto->nombre}}</td>
                        <td>{{$producto->descripcion}}</td>
                        <td>{{$producto->codigo}}</td>
                        <td>{{$producto->precio}}</td>
                        <td>{{$producto->stock}}</td>
                        <td><a href="{{ route('productos.show',$producto->id)}}" class="btn btn-primary">Ver</a></td>
                        <td><a href="{{ route('productos.edit',$producto->id)}}" class="btn btn-primary">Edit</a></td>
                        <td>
                            <form action="{{ route('productos.destroy', $producto->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection