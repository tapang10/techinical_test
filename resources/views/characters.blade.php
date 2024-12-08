<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Characters List Page</title>

    <!-- Bootstrap CSS (via CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="" alt="Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if(auth()->check())
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link custom-font btn btn-link" style="color: inherit; font-size: 16px;">LOGOUT</button>
                        </form>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="{{ route('characters') }}">LIST OF CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="{{ route('user.characters') }}">SAVED CHARACTERS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
        <div class="container mt-5">
            <!-- Show Character Details If Selected -->
            @if(isset($character))
            <div class="container d-flex justify-content-center align-items-center">
                <div class="card mb-4" style="width: 100%; max-width: 600px;">
                    <div class="card-body">
                        <h3 class="text-center mb-4">View Character Page</h3><br></br>
                        <a href="{{ route('characters') }}" class="btn btn-secondary mb-3">&lt; Back to Listing Page</a>
                        <h3 class="card-title text-left">{{ $character['name'] }}</h3>
                        <p><strong>Height:</strong> {{ $character['height'] }} cm</p>
                        <p><strong>Gender:</strong> {{ $character['gender'] }}</p>
                        <p><strong>Mass:</strong> {{ $character['mass'] }} kg</p>
                        <p><strong>Hair Color:</strong> {{ $character['hair_color'] }}</p>
                        <p><strong>Skin Color:</strong> {{ $character['skin_color'] }}</p>
                        <p><strong>Eye Color:</strong> {{ $character['eye_color'] }}</p>
                        <p><strong>Birth Year:</strong> {{ $character['birth_year'] }}</p>
                        <p><strong>Homeworld:</strong> {{ $character['homeworld'] }}</p>
                        <div class="mt-3 d-flex justify-content-center">
                            <form action="{{ route('savedetails') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $id }}">
                                <button type="submit" class="btn btn-success mx-2 custom-btn">Save Character</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <div class="row">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                <h1 class="text-center mb-4">Character Listing Page</h1>
                <h5 class="text-left mb-4">Characters</h5>
                <div class="row">
                    @foreach($people as $char)
                        <div class="col-md-3 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <p><strong>ID:</strong> {{ $char['height'] }} cm</p>
                                    <p><strong>NAME:</strong> {{ $char['name'] }}</p>
                                    <p><strong>GENDER:</strong> {{ $char['gender'] }}</p>
                                    <div class="text-center">
                                        <a href="{{ route('user.characters', ['id' => $char['url']]) }}" class="view-more-link">--- VIEW MORE</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                @if ($isPaginationRequired)
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($previousPage)
                            <li class="page-item">
                                <a class="page-link" href="{{ route('characters', ['page' => $previousPage]) }}" rel="prev">&lt;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&lt;</span>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @for ($i = 1; $i <= $totalPages; $i++)
                            <li class="page-item {{ $i == $page ? 'active' : '' }}">
                                <a class="page-link" href="{{ route('characters', ['page' => $i]) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($nextPage)
                            <li class="page-item">
                                <a class="page-link" href="{{ route('characters', ['page' => $nextPage]) }}" rel="next">&gt;</a>
                            </li>
                        @else
                            <li class="page-item disabled">
                                <span class="page-link">&gt;</span>
                            </li>
                        @endif
                    </ul>
                @endif
            </div>
            @endif
        </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
