<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: #fff;
            padding: 20px;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover {
            background-color: #007bff;
        }
        .content {
            padding: 20px;
        }
        .navbar-custom {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-custom">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Panel de Administración</span>
            <span class="navbar-text">
                Bienvenido, {{auth()->user()->name}}
            </span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 sidebar">
                <h3>Menú</h3>
                <a href="{{route('admin.category')}}">Añadir Categoria</a>
                <a href="{{route('admin.categorylist')}}">Lista de Categorias</a>
                <a href="{{route('admin.productcreate')}}">Añadir productos</a>
                <a href="{{route('admin.productlist')}}">Lista de productos</a>
                <a href="javascript: document.getElementById('logout').submit()">Cerrar Sesión</a>
                <form id="logout" action="{{route('logout')}}" method="post" style="display: none;">
                    @csrf
                </form>
            </div>
            <div class="col-md-9 content">
                <div class="card">
                    <div class="card-header">
                        <h1>Lista admin</h1>
                    </div>
                    <div class="card-body">
                        <p>Bienvenido, {{auth()->user()->name}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
