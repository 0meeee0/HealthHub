<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Medicine Store</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
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

      /* Custom animations */
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="#">HealthHub</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Shop</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero bg-dark text-white text-center py-5">
      <div class="container">
        <h1 class="display-4">Welcome to Our Medicine Store</h1>
        <p class="lead">
          Discover the latest in healthcare and find great deals.
        </p>
        <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
      </div>
    </section>

    <!-- Filter Section -->
    <section class="filter-section">
      <div class="container">
        <h4>Filter Products</h4>
        <div class="row">
          <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Search..." />
          </div>
          <div class="col-md-3">
            <select class="form-control">
              <option>Category</option>
              <option>Supplements</option>
              <option>Medicines</option>
              <option>Vitamins</option>
            </select>
          </div>
          <div class="col-md-3">
            <select class="form-control">
              <option>Price Range</option>
              <option>$0 - $50</option>
              <option>$50 - $100</option>
              <option>$100+</option>
            </select>
          </div>
          <div class="col-md-3">
            <button class="btn btn-primary">Apply Filters</button>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products py-5 fadeIn">
      <div class="container">
        <h2 class="text-center mb-5">Featured Products</h2>
        <div class="row">
          <!-- Product 1 -->
          @foreach ($products as $product)
          <div class="col-md-4">
              <div class="card">
                  <img src="{{ asset('product/' . $product->image) }}" class="card-img-top" alt="{{ $product->title }}">
                  <div class="card-body">
                      <h5 class="card-title">{{ $product->title }}</h5>
                      <p class="card-text">{{ $product->description }}</p>
                      <a href="#" class="btn btn-primary">Add to cart</a>
                  </div>
              </div>
          </div>

@endforeach

          <!-- Add more products and modals as needed -->
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

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
