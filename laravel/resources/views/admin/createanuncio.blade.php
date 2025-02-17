<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Anuncio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.5rem;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }
        .card-body {
            padding: 2rem;
        }
        .form-group label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 10px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 1rem;
        }
        .btn-primary, .btn-danger {
            border-radius: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            width: 25%;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .alert {
            margin-top: 1rem;
        }
        h1 {
            font-size: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }
    </style>
</head>
<body>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Añadir Anuncio
                    </div>
                    <div class="card-body">
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <form action="{{ route('admin.addanuncio') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="title">Título:</label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Ingresa el título del anuncio">
                            </div>
                            <div class="form-group">
                                <label for="message">Mensaje:</label>
                                <input type="text" name="message" id="message" class="form-control" placeholder="Escribe el mensaje del anuncio">
                            </div>
                            <div class="form-group">
                                <label for="date_start">Fecha de Inicio:</label>
                                <input type="date" name="date_start" id="date_start" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="date_end">Fecha de Fin:</label>
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
