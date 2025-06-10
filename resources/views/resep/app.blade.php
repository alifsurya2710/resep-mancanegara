<!DOCTYPE html>
<html>
<head>
    <title>Resep Mancanegara</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background-color: #fff0f5; /* light pink */
        }

        .header-pink {
            background-color: #ff69b4; /* hot pink */
            color: white;
            border-radius: 10px;
            padding: 20px;
        }

        .btn-outline-primary {
            border-color: #ff69b4;
            color: #ff69b4;
        }

        .btn-outline-primary:hover {
            background-color: #ff69b4;
            color: white;
        }

        .btn-outline-danger {
            border-color: #d63384;
            color: #d63384;
        }

        .btn-outline-danger:hover {
            background-color: #d63384;
            color: white;
        }

        .alert-success {
            border-left: 5px solid #ff69b4;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="header-pink d-flex justify-content-between align-items-center mb-4 shadow-sm">
            <h3 class="mb-0"><i class="bi bi-book-fill me-2"></i>Resep Mancanegara</h3>
            <div>
                @auth
                    <span class="me-2"><i class="bi bi-person-circle"></i> {{ Auth::user()->name }}</span>
                    <a href="{{ route('dashboard') }}" class="btn btn-sm btn-outline-primary me-1">Dashboard</a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-sm btn-outline-danger">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-sm btn-outline-primary">Login</a>
                @endauth
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
