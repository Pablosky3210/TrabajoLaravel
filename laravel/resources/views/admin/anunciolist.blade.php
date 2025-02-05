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
        <div><h1><center>Listado de anuncios</center></h1></div>
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
        <table class="table table-hover table-sm" border="1">
            <thead>
                <th>Titulo</th>
                <th>Mensaje</th>
                <th>Fecha inicio</th>
                <th>Fecha fin</th>
            </thead>
            <tbody>
                @foreach($anuncios as $anuncio)
                <tr>
                    <td>
                        {{$anuncio->title}}
                    </td>
                    <td>
                        {{$anuncio->message}}
                    </td>
                    <td>
                        {{$anuncio->date_start}}
                    </td>
                    <td>
                        {{$anuncio->date_end}}
                    </td>
                    <td>
                        <a href="{{route('admin.anuncioedit', $anuncio->id)}}" class="btn btn-warning ">Editar</a>
                        <a href="javascript: document.getElementById('delete-{{$anuncio->id}}').submit()" class="btn btn-danger">Eliminar</a>
                        <form id="delete-{{$anuncio->id}}" action="{{route('admin.anunciodelete', $anuncio->id)}}" method="post">
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