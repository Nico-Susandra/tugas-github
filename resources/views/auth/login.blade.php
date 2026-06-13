<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <title>Form Login Adit Music</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

</head>
<style>
    body {
        
        background-size: cover;
        background-position: center;
        height: 100vh;
        margin: 0;
    }
    .login-container {
        background-color: rgba(255, 255, 255, 0.8); /* White background with opacity */
        border-radius: 10px; /* Rounded corners */
        padding: 20px; /* Padding around the form */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow for depth */
    }
</style>
<body>
    <div class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4 login-container">
            <h2 class="text-center">Form Login</h2>
            <hr>
            <form action="{{ route('login.authenticate') }}" method="post">
                @csrf <!-- CSRF token -->
                <div class="form-group">
                    <label for="inputEmail">Email address</label>
                    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                </div>

                <div class="form-group">
                    <label for="inputPassword">Password</label>
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="rememberMe" value="remember-me">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                </div>
                <button class="btn btn-lg btn-primary w-100" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted text-center">&copy; Adit Music- 2024</p>
            </form>
        </div>
    </div>
</body>
</html>