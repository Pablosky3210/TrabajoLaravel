<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listado de Categorías</title>
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 50px;
        }
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .card-body {
            padding: 30px;
        }
        table {
            width: 100%;
            margin-top: 20px;
        }
        table th {
            background-color: #007bff;
            color: white;
            text-align: center;
        }
        table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn {
            border-radius: 5px;
            padding: 10px 15px;
        }
        .btn-warning {
            background-color: #ffc107;
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .alert {
            margin-top: 20px;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
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
                        <a href="{{ route('admin.index') }}" class="btn btn-danger btn-back">Volver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
