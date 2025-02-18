@extends('layouts.main')
@section('contenido')
            <div class="container">

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Añadir Anuncio
            </div>
            <div class="card-body">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <form action="{{ route('admin.addanuncio') }}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">Título:</label>
                        <input type="text" name="title" id="title" class="form-control" placeholder="Ingresa el título del anuncio">
                    </div>
                    <div class="form-group">
                        <label for="message">Mensaje:</label>
                        <input type="text" name="message" id="message" class="form-control" placeholder="Escribe el mensaje del anuncio">
                    </div>
                    <div class="form-group">
                        <label for="date_start">Fecha de Inicio:</label>
                        <input type="date" name="date_start" id="date_start" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="date_end">Fecha de Fin:</label>
                        <input type="date" name="date_end" id="date_end" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ route('admin.index') }}" class="btn btn-danger">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
