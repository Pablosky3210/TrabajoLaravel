<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Anuncios y Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .ad-card, .product-card {
            margin-bottom: 20px;
        }
        .container {
            padding: 0;
            max-width: 100%;
        }
        .row {
            margin-left: 0;
            margin-right: 0;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="text-center mb-4">Listado de Anuncios</h1>
                <div class="mb-4">
                    <input type="checkbox" id="date-filter" class="form-check-input">
                    <label for="date-filter" class="form-check-label">Filtrar por Fecha Actual</label>
                    <button id="filter-btn" class="btn btn-primary" onclick="filterByDate()">Aplicar Filtro</button>
                </div>
                <div id="ad-list">
                    @foreach($anuncios as $anuncio)
                        <div class="ad-card">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $anuncio->title }}</h5>
                                    <p class="card-text">{{ $anuncio->message }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $anuncio->date_start }}</small></p>
                                    <p class="card-text"><small class="text-muted">{{ $anuncio->date_end }}</small></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        

        function filterByDate() {
            const dateFilter = document.getElementById('date-filter').checked;
            if (dateFilter) {
                window.location.href = '{{ route("products.filterByDate") }}';
            }
        }
    </script>
</body>
</html>
