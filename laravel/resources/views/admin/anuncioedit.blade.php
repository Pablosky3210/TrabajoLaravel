@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Anuncio
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.anuncioupdate', $anuncio->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Título:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $anuncio->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label">Mensaje:</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required>{{ $anuncio->message }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_start" class="form-label">Fecha Inicio:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control" value="{{ $anuncio->date_start }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date_end" class="form-label">Fecha Fin:</label>
                                <input type="date" name="date_end" id="date_end" class="form-control" value="{{ $anuncio->date_end }}" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('admin.anunciolist') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
