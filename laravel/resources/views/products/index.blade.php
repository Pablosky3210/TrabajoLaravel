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
            <div class="col-md-2">
                
            </div>

            <div class="col-md-8">
                <h1 class="text-center mb-4">Listado de Productos</h1>
                <div class="mb-4">
                <div class="mb-4">
                    <a href="{{ route('products.anuncios') }}" class="btn btn-primary">Anuncios</a>
                </div>
                    <label for="category-select" class="form-label">Buscar por Categoría:</label>
                    <select id="category-select" class="form-select" onchange="filterProducts()">
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
