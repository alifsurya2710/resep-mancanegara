<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #ff69b4;
            --primary-hover: #e75490;
            --secondary: #ff99bb;
            --bg-admin: #fff5f8;
            --text-main: #6a1b4d;
            --glass: rgba(255, 255, 255, 0.9);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 0;
            background: var(--bg-admin);
            color: var(--text-main);
            min-height: 100vh;
        }

        header {
            background: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 20px rgba(255, 105, 180, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        header h1 {
            color: var(--primary);
            font-weight: 800;
            font-size: 1.5rem;
            margin: 0;
            letter-spacing: -0.5px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        nav a {
            color: var(--text-main);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.95rem;
            padding: 8px 16px;
            border-radius: 12px;
            transition: all 0.3s ease;
        }

        nav a:hover, nav a.active {
            background: #fff0f6;
            color: var(--primary);
        }

        .btn-logout {
            background: #ffeff5;
            color: #d63384;
            border: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            background: #ffe0eb;
        }

        main {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
            animation: fadeIn 0.5s ease-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .card {
            background: white;
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.05);
            border: 1px solid rgba(255, 105, 180, 0.1);
        }

        .flash-message {
            background: #e6fffa;
            color: #2c7a7b;
            padding: 15px 25px;
            border-radius: 16px;
            margin-bottom: 30px;
            font-weight: 600;
            text-align: center;
            border: 1px solid #b2f5ea;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        /* Forms & Buttons */
        .btn {
            padding: 12px 24px;
            border-radius: 14px;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            text-decoration: none;
        }

        .btn-primary {
            background: var(--primary);
            color: white;
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
        }

        .btn-primary:hover {
            background: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 12px 25px rgba(255, 105, 180, 0.4);
        }

        /* Table Styles */
        .table-container {
            overflow-x: auto;
            border-radius: 20px;
            border: 1px solid rgba(255, 105, 180, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
        }

        th {
            background: #fffafa;
            color: #888;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            padding: 20px;
            text-align: left;
            border-bottom: 2px solid #fff0f6;
        }

        td {
            padding: 20px;
            border-bottom: 1px solid #fff0f6;
            font-weight: 500;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover td {
            background: #fff9fb;
        }

        .action-btns {
            display: flex;
            gap: 10px;
        }

        @media (max-width: 768px) {
            header {
                padding: 20px;
                flex-direction: column;
                gap: 20px;
            }
        }
    </style>
    @yield('styles')
</head>
<body>
    <header>
        <div style="display: flex; align-items: center; gap: 15px;">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 45px; height: 45px; object-fit: cover; border-radius: 50%; border: 2px solid #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.05);">
            <h1>Admin Panel</h1>
        </div>
        <nav>
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <form action="{{ route('admin.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </nav>
    </header>

    <main>
        @if(session('success'))
            <div class="flash-message">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer style="text-align: center; padding: 40px 0; color: #aaa; font-size: 0.85rem; font-weight: 600;">
        &copy; {{ date('Y') }} Resep Mancanegara. Development by <a href="https://www.instagram.com/_mochalifsurya14_/" target="_blank" style="color: #ff69b4; text-decoration: none; font-weight: 700;">Moch Alif Surya Ramadhan</a>
    </footer>

    @yield('scripts')
</body>
</html>
