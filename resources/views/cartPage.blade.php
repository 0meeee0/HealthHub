<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('layouts.nav');

    <table class="table">
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
</h1>


</body>
</html>