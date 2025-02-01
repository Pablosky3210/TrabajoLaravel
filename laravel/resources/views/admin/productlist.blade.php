<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>
<body>
    <div class="card-body">
        <div><h1><center>Listado de categorias</center></h1></div>
        <table class="table table-hover table-sm" border="1">
            <thead>
                <th>Productos</th>
                <th>Precio</th>
                <th>Accion</th>
            </thead>
            <tbody>
                @foreach($products as $productos)
                <tr>
                    <td>
                        {{$productos->description}}
                    </td>
                    <td>
                        {{$productos->price}}
                    </td>
                    <td>
                        <a href="{{route('admin.productedit', $productos->id)}}" class="btn btn-warning ">Editar</a>
                        <a href="javascript: document.getElementById('delete-{{$productos->id}}').submit()" class="btn btn-danger">Eliminar</a>
                        <form id="delete-{{$productos->id}}" action="{{route('admin.productdelete', $productos->id)}}" method="post">
                            @method('delete')
                            @csrf
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{route('admin.index') }}" class="btn btn-danger">Volver</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>