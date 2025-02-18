@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h3>Nueva Categoría</h3>
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.addctg') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="category_n">Nombre de la Categoría:</label>
                                <input type="text" name="category_n" id="category_n" class="form-control" placeholder="Ingrese el nombre de la categoría" required>
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
