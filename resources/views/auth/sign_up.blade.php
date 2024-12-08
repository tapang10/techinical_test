<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
                        <a class="nav-link custom-font" href="{{ route('login') }}">LOG IN</a>
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
            <div class="card-body">
                <h5 class="card-title text-center mb-4 custom-label">Sign-Up</h5>

                <!-- Display Errors -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('sign_up') }}">
                    @csrf

                    <!-- First Name and Last Name -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label custom-txt">First Name</label>
                            <input type="text" name="first_name" id="first_name" class="form-control" required>
                            @error('first_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label custom-txt">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" required>
                            @error('last_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label custom-txt">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
 
                    <!-- Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label custom-txt">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label custom-txt">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sign Up Button -->
                    <button type="submit" class="btn btn-primary w-100 custom-btn">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for components like dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
