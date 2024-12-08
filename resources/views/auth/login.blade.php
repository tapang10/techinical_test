<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <!-- Logo (left) -->
            <a class="navbar-brand" href="#">
                <img src="" alt="Logo" height="40">
            </a>
            <!-- Menu (right) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="{{ route('sign_up') }}">SIGN UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="#">LIST OF CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="#">SAVED CHARARCTERS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Centered Sign-Up Form -->
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card custom-bg" style="width: 100%; max-width: 500px;">
            <div class="card-body d-flex flex-column" style="height: 100%;">
                <h5 class="card-title text-center mb-4 custom-label">Log-In</h5>

                <!-- Display Error Message for Email or Password -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}" class="d-flex flex-column" style="flex-grow: 1;">
                    @csrf

                    <!-- Email Field -->
                    <div class="mb-4">
                        <label for="email" class="form-label custom-txt">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>

                    <!-- Password Field -->
                    <div class="mb-4">
                        <label for="password" class="form-label custom-txt">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>

                    <!-- Spacer with margin -->
                    <div class="mb-5"></div> <!-- Adds a large space before the submit button -->

                    <!-- Login Button -->
                    <button type="submit" class="btn btn-primary w-100 custom-btn">LOG IN</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for components like dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
