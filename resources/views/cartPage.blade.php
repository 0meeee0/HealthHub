<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('layouts.nav')

    {{-- <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price</th>
      <th scope="col">Image</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <?php 
        $totalPrice=0
    ?>
      @foreach ($cart as $c)
    <tr>
        <th scope="row">{{ $c->id }}</th>
        <td>{{ $c->name }}</td>
      <td>{{ $c->quantity }}</td>
      <td>{{ $c->price }}</td>
      <td><img width="100" src="/product/{{ $c->image }}" alt=""></td>
      <td>
         <a href="{{ url('removeCart', $c->id) }}" onclick="return confirm('Remove this product?')" class="btn btn-danger">Remove</a>
    </td>
            
    </tr>
    <?php 
        $totalPrice+= $c->price 
    ?>
    @endforeach
</tbody>
</table>
<h1>
    
    Total Price: {{ $totalPrice }}
</h1> --}}

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col">
        <div class="card">
          <div class="card-body p-4">

            <div class="row">

              <div class="col-lg-7">
                <h5 class="mb-3"><a href="#" onclick="history.back()" class="text-body"><i
                      class="fas fa-long-arrow-alt-left me-2"></i>Back to Store</a></h5>
                <hr>

                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <p class="mb-1">Your Cart</p>
                    <p class="mb-4">You have  {{ count($cart) }} items in your cart</p>
                  </div>
                </div>

                @foreach ($cart as $c)
                <div class="card mb-3 shadow">
                  <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                      <div class="d-flex flex-row align-items-center">
                        <div>
                          <img
                            src="/product/{{ $c->image }}"
                            class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                        </div>
                        <div class="ms-3">
                          <h5>{{ $c->productTitle }}</h5>
                          <p class="small mb-0">Added on the: {{ $c->created_at }}</p>
                        </div>
                      </div>
                      <div class="d-flex flex-row align-items-center">
                        <div style="width: 50px;">
                          <h5 class="fw-normal mb-0">{{ $c->quantity }}</h5>
                        </div>
                        <div style="width: 80px;">
                          <h5 class="mb-0">{{ $c->price }} DH</h5>
                        </div>
                        <a href="{{ url('removeCart', $c->id) }}" onclick="return confirm('Remove this product?')">🗑️</i></a>
                      </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
            <div class="d-flex justify-content-between w-50">
              <button class="btn btn-outline-success shadow">Cash on Delivery 💵</button>
              <button class="btn btn-outline-info shadow">Pay Online</button>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>