@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="card">
            <div class="card-header">
                <h1 class="text-center">Listado de Productos</h1>
            </div>
            <div class="card-body">
                
                <table class="table table-hover table-sm">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Precio</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $productos)
                        <tr>
                            <td>{{$productos->description}}</td>
                            <td>{{$productos->price}}</td>
                            <td>
                                <a href="{{route('admin.productedit', $productos->id)}}" class="btn btn-warning">Editar</a>
                                <a href="javascript: document.getElementById('delete-{{$productos->id}}').submit()" class="btn btn-danger">Eliminar</a>
                                <form id="delete-{{$productos->id}}" action="{{route('admin.productdelete', $productos->id)}}" method="post" style="display: none;">
                                    @method('delete')
                                    @csrf
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
