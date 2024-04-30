<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HealthHub - About Us</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <style>
      .animated {
        animation-duration: 1s;
        animation-fill-mode: both;
      }
      @keyframes slideInRight {
        from {
          transform: translateX(100%);
          opacity: 0;
        }
        to {
          transform: translateX(0);
          opacity: 1;
        }
      }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    @include('layouts.nav')
    <!-- About Section -->
    <section id="about" class="py-5">
      <div class="container">
        <div id="about-content" class="row">
          <div class="col-md-6 offset-md-3 text-center">
            <h2 class="mb-4">About Us</h2>
            <p>
              HealthHub Pharmacy is dedicated to providing high-quality
              pharmaceutical products and services to our customers. We
              prioritize your health and well-being above all else.
            </p>
          </div>
        </div>
      </div>
    </section>
    <!-- Footer -->
    <footer class="bg-dark py-4 text-center text-white">
      <div class="container">
        <p>&copy; 2024 HealthHub. All rights reserved.</p>
      </div>
    </footer>
    <!-- JavaScript for Animation -->
    <script>
      window.onload = function () {
        document
          .getElementById("about-content")
          .classList.add("animated", "slideInRight");
      };
    </script>
  </body>
</html>
