<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        .navbar,
        .footer {
            background-color: #343a40 !important;
        }

        .navbar-brand,
        .footer-text {
            color: #ffffff !important;
        }

        .card {
            border: none;
            transition: transform 0.3s;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .filter-section {
            padding: 20px 0;
            background-color: #e9ecef;
            margin-bottom: 20px;
        }

        .modal-wide .modal-dialog {
            max-width: 80%;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fadeIn {
            animation-name: fadeIn;
            animation-duration: 2s;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    @include('layouts.nav')

    <!-- Hero Section -->
    <section class="hero bg-dark text-white text-center py-5">
        <div class="container">
            <h1 class="display-4">Welcome to Our Medicine Store</h1>
            <p class="lead">
                Discover the latest in healthcare and find great deals.
            </p>
            {{-- <form action="showCart" method="GET">
                <button type="submit">cart</button>
            </form> --}}
        </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
        <div class="container">
            <h4>Filter Products</h4>
            <div class="row d-flex justify-content-center">
                <div class="col-md-3">
                    <form action="{{ route('search') }}" method="GET">
                        @csrf
                        <input type="text" name="title" class="form-control" placeholder="Search...">
                    </form>
                    
                </div>
                <div class="col-md-3">
                    <form action="{{ route('filterCategory') }}" method="GET">
                        @csrf
                        <select name="category" class="form-control">
                            <option value="All">All</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->catName }}</option>
                            @endforeach
                            
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary">Apply Filters</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products py-5 fadeIn">
    <div class="container">
        <h2 class="text-center mb-5">Featured Medicines</h2>
        <div class="row">
            @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card mb-3">
                    <img height="300" src="{{ asset('product/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->category->catName }}</p>
                        <p class="card-text">{{ $product->price }} DH</p>
                        {{-- <form action="{{ route('addCart', $product->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1">
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                        <!-- Button trigger modal --> --}}
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                            View Details
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-labelledby="productModalLabel{{ $product->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productModalLabel{{ $product->id }}">{{ $product->title }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <img width="200" src="{{ asset('product/' . $product->image) }}" class="img-fluid mb-3" alt="{{ $product->title }}">
                            <p>Description: {{ $product->description }}</p>
                            <p>Category: {{ $product->category->catName }}</p>
                            <p>Price: {{ $product->price }} DH</p>
                            <form action="{{ route('addCart', $product->id) }}" method="POST">
                                @csrf
                                <input type="number" name="quantity" value="1" min="1">
                                <button type="submit" class="btn btn-primary">Add to cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4">
        <div class="container">
            <p class="footer-text">
                &copy; 2024 Medicine Store. All rights reserved.
            </p>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
