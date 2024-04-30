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
  </head>
  <body>
    <!-- Navigation -->
    @include('layouts.nav')

    <!-- Community Section -->
    <section id="community" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <h2 class="mb-4">Community Forum</h2>

            <!-- Post Form -->
            <form action="{{ route('addPost') }}" method="POST">
              @csrf
              <div class="form-group">
                <label for="postTitle">Post Title</label>
                <input
                  type="text"
                  name="title"
                  class="form-control"
                  id="postTitle"
                  placeholder="Enter post title"
                />
              </div>
              <div class="form-group">
                <label for="postContent">Post Content</label>
                <textarea
                  name="content"
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
        @foreach ($posts as $post)
            <div id="post-{{ $post->id }}" class="card mb-3 shadow">
                <div class="card-body bg-light">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text">
                        <small class="text-muted">Posted by {{ $post->user->username }} - {{ $post->created_at->diffForHumans() }}</small>
                    </p>
                    <hr />
                    <!-- Comment Section -->
                    <h6 class="card-subtitle mb-2 text-muted">Comments:</h6>
                    <!-- Display existing comments -->
                    @foreach ($post->comments as $comment)
                        <div class="media">
                            <img src="https://banner2.cleanpng.com/20180329/zue/kisspng-computer-icons-user-profile-person-5abd85306ff7f7.0592226715223698404586.jpg"
                                class="mr-3 rounded-circle"
                                width="50"
                                alt="User Avatar"/>
                            <div class="media-body mb-2">
                                <h6 class="mt-0"> >{{ $comment->user->username }}</h6>
                                <p class="mb-0">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach
                    <!-- Comment Form -->
                    <div class="media">
                        
                        <div class="media-body">
                            <h6 class="mt-0"></h6>
                            <form action="{{ route('addComment') }}" method="POST">
                                @csrf
                                <input type="hidden" name="post_id" value="{{ $post->id }}">
                                <input type="text" class="form-control" name="comment" placeholder="Enter your comment...">
                                <button type="submit" class="btn btn-primary mt-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

          </div>
          <div class="col-md-4">
            <h3 class="mb-4">Recent Topics</h3>
            <ul class="list-group">
                @foreach ($recentTopics as $topic)
                    <li class="list-group-item">
                        <a href="#" onclick="scrollToPost({{ $topic->id }})">{{ $topic->title }}</a>
                    </li>
                @endforeach
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

    <script>
      function scrollToPost(postId) {
          var element = document.getElementById('post-' + postId);
          if (element) {
              element.scrollIntoView({ behavior: 'smooth', block: 'start' });
          }
      }
    </script>
    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
