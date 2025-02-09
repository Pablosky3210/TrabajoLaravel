<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Nueva Anuncio
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                        <form action="{{ route('admin.addanuncio') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Titulo:</label>
                                <input type="text" name="title" id="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje:</label>
                                <input type="text" name="message" id="message" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_start">Fecha inicio:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_end">Fecha fin:</label>
                                <input type="date" name="date_end" id="date_end" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="{{ route('admin.index') }}" class="btn btn-danger">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
