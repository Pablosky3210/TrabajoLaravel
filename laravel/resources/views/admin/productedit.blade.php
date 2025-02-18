@extends('layouts.main')
@section('contenido')
            <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Producto</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.productupdate', $product->id) }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="description">Nombre:</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{$product->description}}" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price">Precio:</label>
                                <input type="text" name="price" id="price" class="form-control" value="{{$product->price}}" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('admin.productlist') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
