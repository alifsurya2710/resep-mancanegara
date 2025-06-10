<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Admin Dashboard')</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 20px;
            background: #ffe6f0;
            color: #6a1b4d;
        }

        header {
            margin-bottom: 25px;
            padding-bottom: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            border-bottom: 3px solid #ff69b4;
        }

        header h1 {
            color: #d6336c;
            font-weight: 900;
            font-size: 28px;
            margin: 0;
            letter-spacing: 1.2px;
        }

        nav {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        nav a {
            color: #ff1493;
            text-decoration: none;
            font-weight: 700;
            font-size: 1rem;
            padding: 8px 18px;
            border-radius: 30px;
            border: 2px solid #ff69b4;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        nav a:hover {
            background-color: #ff69b4;
            color: white;
        }

        form {
            margin: 0;
        }

        .btn {
            font-family: inherit;
            font-weight: 700;
            font-size: 0.9rem;
            padding: 8px 18px;
            border-radius: 30px;
            cursor: pointer;
            border: 2px solid transparent;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .btn-edit {
            background-color: #ff69b4;
            color: white;
        }

        .btn-edit:hover {
            background-color: #e75490;
            border-color: #e75490;
        }

        .btn-delete {
            background-color: #ff99bb;
            color: white;
            border: none;
        }

        .btn-delete:hover {
            background-color: #e75490;
        }

        .btn-add {
            background: linear-gradient(45deg, #ffc1d6, #ff69b4);
            color: white;
            padding: 10px 22px;
            display: inline-block;
            margin-bottom: 20px;
            font-weight: 700;
            border-radius: 30px;
            text-decoration: none;
            box-shadow: 0 6px 15px rgba(255, 105, 180, 0.3);
            transition: background 0.3s ease;
        }

        .btn-add:hover {
            background: linear-gradient(45deg, #ff69b4, #d6336c);
            box-shadow: 0 8px 25px rgba(255, 105, 180, 0.5);
        }

        .flash-message {
            margin-bottom: 20px;
            padding: 14px 20px;
            background-color: #ffd6e8;
            color: #c71585;
            border: 1px solid #ffaec9;
            border-radius: 10px;
            font-weight: 700;
            text-align: center;
            box-shadow: 0 3px 15px rgba(255, 105, 180, 0.15);
            max-width: 480px;
            margin-left: auto;
            margin-right: auto;
        }

        main {
            max-width: 980px;
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff0f6;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(255, 105, 180, 0.15);
        }

        table, th, td {
            border: 1px solid #ffb6c1;
        }

        th, td {
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
        }

        th {
            background: linear-gradient(90deg, #ffc0cb, #ff69b4);
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
        }

        td {
            color: #6a1b4d;
        }

        tr:hover td {
            background-color: #ffe6f0;
            transition: background-color 0.3s ease;
        }
    </style>
</head>
<body>
    <header>
        <h1>Admin Dashboard</h1>
        <nav>
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
            <form action="{{ route('admin.logout') }}" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-delete" style="font-size: 0.9rem;">Logout</button>
            </form>
        </nav>
    </header>

    @if(session('success'))
        <div class="flash-message">
            {{ session('success') }}
        </div>
    @endif

    <main>
        @yield('content')
    </main>
</body>
</html>
