@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Listado de Categorías</h3>
                    </div>
                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <table class="table table-hover table-sm">
                            <thead>
                                <tr>
                                    <th>Categoría</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $categorias)
                                <tr>
                                    <td>{{ $categorias->category_n }}</td>
                                    <td>
                                        <a href="{{ route('admin.categoryedit', $categorias->id) }}" class="btn btn-warning">Editar</a>
                                        <a href="javascript: document.getElementById('delete-{{$categorias->id}}').submit()" class="btn btn-danger">Eliminar</a>
                                        <form id="delete-{{$categorias->id}}" action="{{ route('admin.categorydelete', $categorias->id) }}" method="post" style="display:none;">
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
        </div>
    </div>
@endsection