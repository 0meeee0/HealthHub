<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HealthHub - Community</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
    />
    <link rel="stylesheet" href="styles.css" />
    <!-- You can customize this file -->
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
              <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="community.html">Community</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Community Section -->
    <section id="community" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2 class="mb-4">Community Forum</h2>

            <!-- Post Form -->
            <form>
              <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input
                  type="text"
                  class="form-control"
                  id="postTitle"
                  placeholder="Enter post title"
                />
              </div>
              <div class="form-group">
                <label for="postContent">Post Content</label>
                <textarea
                  class="form-control"
                  id="postContent"
                  rows="5"
                  placeholder="Enter post content"
                ></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit Post</button>
            </form>

            <hr />

            <!-- Posts -->
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Post Title</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Mauris volutpat, ipsum nec lacinia congue, nunc lorem tempor
                  quam, in molestie dui leo non libero.
                </p>
                <p class="card-text">
                  <small class="text-muted">Posted by Mehdi - 1 hour ago</small>
                </p>
                <hr />
                <!-- Comment Section -->
                <h6 class="card-subtitle mb-2 text-muted">Comments:</h6>
                <div class="media">
                  <img
                    src="https://banner2.cleanpng.com/20180329/zue/kisspng-computer-icons-user-profile-person-5abd85306ff7f7.0592226715223698404586.jpg"
                    class="mr-3 rounded-circle"
                    width="50"
                    alt="User Avatar"
                  />
                  <div class="media-body">
                    <h6 class="mt-0">Commenter Name</h6>
                    Comment goes here
                  </div>
                </div>
              </div>
            </div>
            <div class="card mb-3">
              <div class="card-body">
                <h5 class="card-title">Post Title</h5>
                <p class="card-text">
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                  Mauris volutpat, ipsum nec lacinia congue, nunc lorem tempor
                  quam, in molestie dui leo non libero.
                </p>
                <p class="card-text">
                  <small class="text-muted">Posted by Mehdi - 1 hour ago</small>
                </p>
                <hr />
                <!-- Comment Section -->
                <h6 class="card-subtitle mb-2 text-muted">Comments:</h6>
                <!-- <div class="media">
                  <img
                    src="https://via.placeholder.com/50"
                    class="mr-3 rounded-circle"
                    alt="User Avatar"
                  />
                  <div class="media-body">
                    <h6 class="mt-0">Commenter Name</h6>
                    Comment content goes here...
                  </div>
                </div> -->
              </div>
            </div>

            <!-- Add more posts here -->
          </div>
          <div class="col-md-4">
            <h3 class="mb-4">Recent Topics</h3>
            <ul class="list-group">
              <li class="list-group-item">Topic 1</li>
              <li class="list-group-item">Topic 2</li>
              <li class="list-group-item">Topic 3</li>
              <li class="list-group-item">Topic 4</li>
              <li class="list-group-item">Topic 5</li>
            </ul>
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