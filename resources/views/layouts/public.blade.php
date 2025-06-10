<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Resep Mancanegara')</title>

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(to bottom right, #ffc1dc, #ff8bb3);
      color: #6a1b4d;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      padding: 20px;
    }

    header {
      text-align: center;
      background: linear-gradient(to right, #ff69b4, #ff85c1);
      color: white;
      padding: 25px 20px;
      border-radius: 20px;
      box-shadow: 0 6px 16px rgba(255, 105, 180, 0.4);
      margin-bottom: 30px;
    }

    header h1 {
      font-size: 2.2rem;
      font-weight: 600;
      letter-spacing: 1px;
    }

    main {
      flex: 1;
      max-width: 960px;
      margin: 0 auto;
      background: rgba(255, 240, 245, 0.85);
      backdrop-filter: blur(6px);
      padding: 30px 40px;
      border-radius: 24px;
      box-shadow: 0 10px 25px rgba(255, 105, 180, 0.25);
    }

    footer {
      text-align: center;
      margin-top: 40px;
      padding: 15px 0;
      font-size: 0.95rem;
      color: #a8326f;
      border-top: 2px dashed #ffaad4;
    }

    a {
      color: #d63384;
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    a:hover {
      color: #a8326f;
      text-decoration: underline;
    }

    .btn-pink {
      background-color: #ff69b4;
      color: white;
      padding: 8px 16px;
      border: none;
      border-radius: 30px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 3px 8px rgba(255, 105, 180, 0.3);
      transition: background-color 0.3s ease, transform 0.2s ease;
    }

    .btn-pink:hover {
      background-color: #ff4f9d;
      transform: scale(1.03);
    }

    @media (max-width: 600px) {
      main {
        padding: 20px;
      }

      header h1 {
        font-size: 1.7rem;
      }
    }
  </style>

  @yield('styles')
</head>
<body>

  <header>
    <h1>Resep Mancanegara</h1>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    &copy; {{ date('Y') }} Resep Mancanegara. Dibuat dengan ❤️
  </footer>

  @yield('scripts')
</body>
</html>
