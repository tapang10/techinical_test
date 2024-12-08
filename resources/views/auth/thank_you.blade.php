
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you for Registration. You can now </title>

    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                        <a class="nav-link active" href="{{ route('sign_up') }}">SIGN UP</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">LIST OF CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">SAVED CHARARCTERS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Centered Sign-Up Form --> 
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card custom-bg" style="width: 100%; max-width: 500px;">
            <div class="card-body thank-you-container">
                <!-- Flash Success or Error Message -->
                @if(session('success'))
                    <div class="alert alert-success text-center">
                        {{ session('success') }}
                    </div>
                @elseif(session('error'))
                    <div class="alert alert-danger text-center">
                        {{ session('error') }}
                    </div>
                @endif
                <h4 class="mb-3 custom-label">Thank You</h4>
                <p class="mb-3 custom-txt">Your email has been successfully submitted! Please verify it below.</p>
                 <br></br>
                 <br></br>
                 <form method="POST" action="{{ route('verify.code') }}" class="p-4 mx-auto" style="max-width: 400px;">
                    @csrf
                    <div class="mb-3 text-center">
                        <h5 class="custom-label">Enter Verification Code</h5>
                        <p class="text-muted small">Please enter the 6-digit code sent to your email.</p>
                    </div>

                    <!-- Verification Code Input -->
                    <div class="mb-3">
                        <label for="verify" class="form-label custom-txt">Verification Code</label>
                        <input type="text" name="code" id="code" maxlength="6" pattern="\d{6}" 
                            class="form-control text-center fw-bold fs-5" placeholder="Enter code" required>
                        @error('code')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary custom-btn">Submit</button>
                    </div>
                </form>
                <br></br><br></br>

                <p class="mt-4 custom-txt text-center">If you didn’t receive a code, please check your spam folder or request a new one.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional for components like dropdowns, etc.) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.min.js"></script>

</body>
</html>
