<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Editar Producto</title>
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
            font-size: 1.25rem;
            text-align: center;
            border-radius: 8px 8px 0 0;
            padding: 10px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .btn {
            padding: 10px 20px;
            border-radius: 5px;
            width: 100%;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .form-control {
            border-radius: 5px;
            padding: 10px;
        }
        .form-label {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Editar Producto
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.anuncioupdate', $anuncio->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <div class="form-group">
                                <label for="title" class="form-label">Título:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ $anuncio->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="message" class="form-label">Mensaje:</label>
                                <textarea name="message" id="message" class="form-control" rows="4" required>{{ $anuncio->message }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="date_start" class="form-label">Fecha Inicio:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control" value="{{ $anuncio->date_start }}" required>
                            </div>
                            <div class="form-group">
                                <label for="date_end" class="form-label">Fecha Fin:</label>
                                <input type="date" name="date_end" id="date_end" class="form-control" value="{{ $anuncio->date_end }}" required>
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a href="{{ route('admin.anunciolist') }}" class="btn btn-danger">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
