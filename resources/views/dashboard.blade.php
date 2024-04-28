<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .tablestyle{
            background-color: rgba(72, 72, 86, 0.096);
        }
    </style>
</head>
<body>
    @include('layouts.nav')
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-black">
        <div class="container">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#addMedicineModal">Add Medicine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#categories">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-users">Show Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#show-orders">Show Orders</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Add Medicine Modal -->
    <div class="modal fade" id="addMedicineModal" tabindex="-1" aria-labelledby="addMedicineModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMedicineModalLabel">Add Medicine</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="addProduct" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Form fields for adding medicine -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Medicine Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category" required>
                                <!-- Options for categories -->
                                @foreach ($categories as $category)
                                <option value="{{ $category->catName }}">{{ $category->catName }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"  required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Medicine Image</label>
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Add Medicine</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProductModalLabel">Edit Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Form fields for editing product -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <div id="categories" class="container mt-4">
        <!-- Categories Section Content -->
        <h3>Available Categories</h3>
        <div class="row">
            <div class="col">
                <!-- Display categories -->
                @if(session()->has('message2'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message2') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <table class="table tablestyle shadow table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Loop through categories and display each row -->
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->catName }}</td>
                            <td>
                                <a class="btn btn-danger" href="{{ url('deleteCat', $category->id) }}">Delete</a>
                                <a class="btn btn-warning" href="{{ url('deleteCat', $category->id) }}">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col">
                <!-- Form for adding new category -->
                @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h3>Add New Category</h3>
                <form method="POST" action="{{ route('addCategory') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="catName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="catName" name="catName" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Category</button>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <section id="show-users" class="mt-5">
            <h2></h2>
            <div class="container mt-4">
                <section id="show-products" class="mt-5">
                    <h2>Medicine List</h2>
                    <table class="table shadow tablestyle">
                        <thead>
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Category</th>
                                <th scope="col">Price</th>
                                <th scope="col">Description</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->category }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <img height="100" width="100" src="{{ asset('product/' . $product->image) }}" alt="Product Image">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="" data-bs-toggle="modal" data-bs-target="#editProductModal">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ url('deleteProduct', $product->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>

        </section>

    </div>


    <div class="container mt-4">
    <!-- Orders Section -->
    <section id="show-orders" class="mt-5">
        <h2>Show Orders</h2>
        <!-- Orders Table -->
        <table class="table shadow tablestyle">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Email</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Delivery Status</th>
                    <th scope="col">Address</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delivered</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through orders and display each row -->
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->address }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price }}</td>
                    <td>{{ $order->dilevery_status }}</td>
                    <td>{{ $order->address }}</td>
                    <td><img src="{{ asset('product/' . $order->image) }}" alt="Order Image" style="width: 100px; height: 100px;"></td>
                    <td> <button class="btn btn-info">Delivered</button> </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</div>


    <div class="container mt-4">
        <!-- Users Section -->
        <section id="show-users" class="mt-5">
            <h2>Show Users</h2>
            <!-- Users Table -->
            <table class="table shadow tablestyle" >
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop through users and display each row -->
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
