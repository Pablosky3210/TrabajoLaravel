@extends('layouts.main')
@section('contenido')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Listado de Anuncios</h1>
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
                            <th>Título</th>
                            <th>Mensaje</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anuncios as $anuncio)
                        <tr>
                            <td>{{ $anuncio->title }}</td>
                            <td>{{ $anuncio->message }}</td>
                            <td>{{ $anuncio->date_start }}</td>
                            <td>{{ $anuncio->date_end }}</td>
                            <td>
                                <a href="{{ route('admin.anuncioedit', $anuncio->id) }}" class="btn btn-warning">Editar</a>
                                <a href="javascript: document.getElementById('delete-{{$anuncio->id}}').submit()" class="btn btn-danger">Eliminar</a>
                                <form id="delete-{{$anuncio->id}}" action="{{ route('admin.anunciodelete', $anuncio->id) }}" method="POST" style="display: none;">
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

