@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        <h3>Editar Categoría</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categoryupdate', $category->id) }}" method="post">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="category_n">Nombre de la Categoría:</label>
                                <input type="text" name="category_n" id="category_n" class="form-control" value="{{ $category->category_n }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('admin.categorylist') }}" class="btn btn-danger ml-3">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
