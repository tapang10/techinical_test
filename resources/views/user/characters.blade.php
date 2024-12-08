<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saved Characters</title>

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
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="nav-link custom-font btn btn-link" style="color: inherit; padding: 0; font-size: 16px;">LOGOUT</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="{{ route('characters') }}">LIST OF CHARACTERS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link custom-font" href="#">SAVED CHARACTERS</a>
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
                <!-- View Characters Page Title -->
                <h3 class="text-center mb-4">View Character Page</h3><br></br>
                <a href="{{ route('user.characters') }}" class="btn btn-secondary mb-3">&lt; Back to Listing Page</a>
                <h3 class="card-title text-left">{{ $character->name }}</h3>
                <p><strong>Height:</strong> {{ $character->height }} cm</p>
                <p><strong>Gender:</strong> {{ $character->gender }}</p>
                <p><strong>Mass:</strong> {{ $character->mass }} kg</p>
                <p><strong>Hair Color:</strong> {{ $character->hair_color }}</p>
                <p><strong>Skin Color:</strong> {{ $character->skin_color }}</p>
                <p><strong>Eye Color:</strong> {{ $character->eye_color }}</p>
                <p><strong>Birth Year:</strong> {{ $character->birth_year }}</p>
                <p><strong>Homeworld:</strong> {{ $character->homeworld }}</p>

                <!-- Action Buttons -->
                <div class="mt-3 d-flex justify-content-center">
                    <!-- Delete Character Form -->
                    <form action="{{ route('deletesaveuser', ['id' => $character->id]) }}" method="POST">
                        @csrf
                        @method('DELETE') <!-- This indicates a DELETE request -->
                        <input type="hidden" name="id" value="{{ $id }}">
                        <button type="submit" class="btn btn-danger mx-2 custom-btn">Delete Character</button>
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
        @if($characters->isEmpty())
            <p class="text-center">No characters saved yet.</p>
        @else
            <h1 class="text-center mb-4">Saved Characters</h1>
            <h5 class="text-left mb-4">Saved Characters</h5>
            <div class="row">
                @foreach($characters as $char)
                    <div class="col-md-3 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <p><strong>ID:</strong> {{ $char->height }} cm</p>
                                <p><strong>NAME:</strong> {{ $char->name }}</p>
                                <p><strong>GENDER:</strong> {{ $char->gender }}</p>
                                <div class="text-center">
                                    <a href="{{ route('user.characters', ['id' => $char->id]) }}" class="view-more-link">--- VIEW MORE</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                @if ($characters->hasPages())
                    <ul class="pagination">
                        <!-- Previous Page Link -->
                        @if ($characters->onFirstPage())
                            <li class="page-item disabled">
                                <span class="page-link">&lt;</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{ $characters->previousPageUrl() }}" rel="prev">&lt;</a>
                            </li>
                        @endif

                        <!-- Page Numbers -->
                        @for ($i = 1; $i <= $characters->lastPage(); $i++)
                            <li class="page-item {{ $i == $characters->currentPage() ? 'active' : '' }}">
                                <a class="page-link" href="{{ $characters->url($i) }}">{{ $i }}</a>
                            </li>
                        @endfor

                        <!-- Next Page Link -->
                        @if ($characters->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $characters->nextPageUrl() }}" rel="next">&gt;</a>
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
    @endif
</div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
