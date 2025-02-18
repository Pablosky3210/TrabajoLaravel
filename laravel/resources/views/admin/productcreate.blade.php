@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Añadir Producto
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.addproduct') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="descripcion">Descripción del Producto:</label>
                                <input type="text" name="description" class="form-control" placeholder="Ingrese la descripción del producto">
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input type="number" name="price" class="form-control" placeholder="Ingrese el precio del producto">
                            </div>
                            <div class="form-group">
                                <label for="categoria">Categoría:</label>
                                <select name="id_category" class="form-control">
                                    @foreach($category as $categoria)
                                        <option value="{{ $categoria->id }}">{{ $categoria->category_n }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Imagen del Producto:</label>
                                <input type="file" name="image" id="image" accept="image/*" class="form-control" required>
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
