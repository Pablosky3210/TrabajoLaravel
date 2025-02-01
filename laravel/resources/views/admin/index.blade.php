<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista admin</h1>
    Bienvenido {{auth()->user()->name}}
    <a href="{{route('admin.category')}}">Añadir Categoria</a>
    <a href="{{route('admin.categorylist')}}">Lista de Categorias</a>
    <a href="{{route('admin.productcreate')}}">Añadir productos</a>
    <a href="{{route('admin.productlist')}}">Lista de productos</a>
    <a href="javascript: document.getElementById('logout').submit()">Cerrar Sesion</a>
    <form id="logout" action="{{route('logout')}}" method="post" style="display: none;">
        @csrf
    </form>
    
</body>
</html>