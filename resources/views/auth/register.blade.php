<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Signup</title>
</head>
<body>
    <form action="{{ route('registerUser') }}" method="POST">
        @csrf
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="Password" name="password" id="password">
        </div>
        <div>
            <label for="cPassword">Confirm Password</label>
            <input type="Password" name="cPassword" id="cPassword">
        </div>
        <button type="submit">go</button>
        <a href="">Login</a>
    </form>
</body>
</html>