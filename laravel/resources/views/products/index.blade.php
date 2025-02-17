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
        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 text-center">
                <h1 class="text-center mb-4">Listado de Productos</h1>
                <div class="mb-4">
                    <a href="{{ route('products.anuncios') }}" class="btn btn-primary mb-3">Anuncios</a>
                    <label for="category-select" class="form-label">Buscar por Categoría:</label>
                    <select id="category-select" class="form-select mb-4" onchange="filterProducts()">
                        <option value="{{ route('products.index') }}" {{ $selectedCategory === 'all' ? 'selected' : '' }}>Todas</option>
                        @foreach($categories as $category)
                            <option value="{{ route('products.filter', $category->id) }}" {{ $selectedCategory == $category->id ? 'selected' : '' }}>{{ $category->category_n }}</option>
                        @endforeach
                    </select>
                </div>
                <div id="product-list" class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 product-card">
                            <div class="card">
                                <!-- Mostrar la imagen desde la base de datos -->
                                <img src="{{ asset('storage/' . basename(dirname($product->getFirstMediaUrl())) . '/' . basename($product->getFirstMediaUrl())) }}" class="card-img-top" alt="{{ $product->title }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->title }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">Precio: ${{ number_format($product->price, 2) }}</p>
                                    <p class="card-text"><small class="text-muted">{{ $product->category->name }}</small></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        function filterProducts() {
            const categorySelect = document.getElementById('category-select');
            const selectedCategory = categorySelect.value;
            window.location.href = selectedCategory;
        }
    </script>
</body>
</html>
