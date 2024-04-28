<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HealthHub - Your Trusted Pharmacy</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <!-- Navigation -->
     @include('layouts.nav')

    <!-- Banner Section -->
    <section id="banner" class="py-5 text-white text-center">
      <div class="container-fluid">
        <div id="bannerCarousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img
                src="https://assets.contenthub.wolterskluwer.com/api/public/content/2d6270134d914df784f05b8e6fdcb848?v=dc0e0f0a"
                class="d-block w-100"
                alt="Slide 1"
              />
              <div class="carousel-caption d-none d-md-block">
                <h1 class="display-4">Welcome to HealthHub Pharmacy</h1>
                <p class="lead">
                  Your trusted source for all your pharmaceutical needs.
                </p>
                <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
              </div>
            </div>
            <div class="carousel-item">
              <img
                src="https://pharmacyconnection.ca/wp-content/uploads/2019/07/Banner_Summer2019_FocusError_BusyPharmacist.jpg"
                class="d-block w-100"
                alt="Slide 2"
              />
            </div>
            <div class="carousel-item">
              <img
                src="https://www.hirequotient.com/_next/image?url=https%3A%2F%2Fstrapi.caseyinterview.com%2Fuploads%2FTop_7_steps_to_consider_while_hiring_pharmacists_in_2023_f553a8d157.png&w=1920&q=75"
                class="d-block w-100"
                alt="Slide 3"
              />
            </div>
          </div>
          <a
            class="carousel-control-prev"
            href="#bannerCarousel"
            role="button"
            data-slide="prev"
          >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next"
            href="#bannerCarousel"
            role="button"
            data-slide="next"
          >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>About Us</h2>
            <p>
              HealthHub Pharmacy is dedicated to providing high-quality
              pharmaceutical products and services to our customers. We
              prioritize your health and well-being above all else.
            </p>
          </div>
          <div class="col-md-6">
            <img
              src="https://pharmdonline.findlay.edu/sites/default/files/2023-06/The%20Role%20of%20Pharmacists%20in%20Healthcare%20Systems.jpg"
              alt="About Us"
              class="img-fluid"
            />
          </div>
        </div>
      </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center">Our Services</h2>
        <div class="row">
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <i class="fas fa-prescription-bottle-alt fa-4x mb-3"></i>
                <h4 class="card-title">Prescription Refills</h4>
                <p class="card-text">
                  Easily refill your prescriptions online.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <i class="fas fa-shipping-fast fa-4x mb-3"></i>
                <h4 class="card-title">Fast Delivery</h4>
                <p class="card-text">
                  Get your medications delivered quickly and securely.
                </p>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <div class="card-body text-center">
                <i class="fas fa-user-md fa-4x mb-3"></i>
                <h4 class="card-title">Expert Consultation</h4>
                <p class="card-text">
                  Consult with our experienced pharmacists for personalized
                  advice.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2>Contact Us</h2>
            <p>Have any questions or concerns? Feel free to reach out to us.</p>
            <ul class="list-unstyled">
              <li>
                <i class="fas fa-map-marker-alt"></i> 123 Health Street, City,
                Country
              </li>
              <li><i class="fas fa-phone"></i> +1 (555) 123-4567</li>
              <li>
                <i class="fas fa-envelope"></i> info@healthhubpharmacy.com
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Name" />
              </div>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" />
              </div>
              <div class="form-group">
                <textarea
                  class="form-control"
                  rows="5"
                  placeholder="Message"
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Community Section -->
    <section id="community" class="py-5 bg-light">
      <div class="container">
        <h2 class="text-center mb-4">Join Our Community</h2>
        <div class="row">
          <div class="col-md-8 mx-auto">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Community Forum</h5>
                <p class="card-text">
                  Join our community forum to discuss health-related topics,
                  share experiences, and connect with others.
                </p>
                <a href="#" class="btn btn-primary">Join Now</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark py-4 text-center text-white">
      <div class="container">
        <p>&copy; 2024 HealthHub Pharmacy. All rights reserved.</p>
      </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
