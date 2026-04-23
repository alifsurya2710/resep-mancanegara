<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'Resep Mancanegara')</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #ff69b4;
      --primary-dark: #d63384;
      --primary-light: #ffaad4;
      --accent: #6a1b4d;
      --bg-gradient: linear-gradient(135deg, #ffc1dc 0%, #ff8bb3 100%);
      --glass: rgba(255, 255, 255, 0.7);
      --glass-border: rgba(255, 255, 255, 0.4);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg-gradient);
      background-attachment: fixed;
      color: var(--accent);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      line-height: 1.6;
    }

    header {
      text-align: center;
      background: linear-gradient(to right, var(--primary), #ff85c1);
      color: white;
      padding: 40px 20px;
      margin-bottom: 40px;
      box-shadow: 0 10px 30px rgba(255, 105, 180, 0.3);
      position: relative;
      overflow: hidden;
    }

    header::before {
      content: '';
      position: absolute;
      top: -50%;
      left: -20%;
      width: 140%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 70%);
      transform: rotate(-15deg);
    }

    header h1 {
      font-family: 'Outfit', sans-serif;
      font-size: 3.5rem;
      font-weight: 800;
      letter-spacing: -1.5px;
      position: relative;
      z-index: 1;
      text-shadow: 0 4px 15px rgba(0,0,0,0.1);
      margin-bottom: 5px;
    }

    header p {
      font-size: 1.2rem;
      opacity: 0.95;
      font-weight: 500;
      position: relative;
      z-index: 1;
      letter-spacing: 0.5px;
    }

    .brand-logo {
      position: absolute;
      top: 30px;
      left: 30px;
      width: 90px;
      height: 90px;
      background: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      border: 3px solid rgba(255, 255, 255, 0.5);
      z-index: 10;
      transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
      overflow: hidden;
    }

    .brand-logo:hover {
      transform: scale(1.1) rotate(5deg);
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
      border-color: white;
    }

    .brand-logo img {
      width: 80%;
      height: auto;
    }

    main {
      flex: 1;
      width: 100%;
      max-width: 1100px;
      margin: 0 auto 40px;
      background: var(--glass);
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
      padding: 40px;
      border-radius: 32px;
      border: 1px solid var(--glass-border);
      box-shadow: 0 20px 50px rgba(255, 105, 180, 0.15);
      animation: slideUp 0.6s ease-out;
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    footer {
      text-align: center;
      padding: 30px 0;
      font-size: 0.9rem;
      color: var(--accent);
      font-weight: 600;
      opacity: 0.8;
    }

    a {
      color: var(--primary-dark);
      text-decoration: none;
      font-weight: 600;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    a:hover {
      color: var(--accent);
    }

    .btn-pink {
      background: var(--primary);
      color: white;
      padding: 12px 24px;
      border: none;
      border-radius: 16px;
      font-weight: 600;
      cursor: pointer;
      box-shadow: 0 8px 20px rgba(255, 105, 180, 0.3);
      transition: all 0.3s ease;
      display: inline-block;
      text-align: center;
    }

    .btn-pink:hover {
      background: var(--primary-dark);
      transform: translateY(-2px);
      box-shadow: 0 12px 25px rgba(255, 105, 180, 0.4);
    }

    /* Container for cards */
    .recipe-grid {
      display: grid;
      grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
      gap: 30px;
    }

    @media (max-width: 768px) {
      body {
        padding: 10px;
      }
      main {
        padding: 25px 20px;
        border-radius: 24px;
      }
      header {
        padding: 30px 15px;
        border-radius: 0 0 24px 24px;
        margin: -10px -10px 30px -10px;
      }
      header h1 {
        font-size: 2.2rem;
      }
      .brand-logo {
        width: 60px;
        height: 60px;
        top: 15px;
        left: 15px;
      }
    }
  </style>

  @yield('styles')
</head>
<body>

  <header>
    <a href="{{ route('home') }}" class="brand-logo">
        <img src="{{ asset('images/logo.png') }}" alt="Logo">
    </a>
    <h1>Resep Mancanegara</h1>
    <p>Temukan cita rasa dunia di dapur Anda</p>
  </header>

  <main>
    @yield('content')
  </main>

  <footer>
    &copy; {{ date('Y') }} Resep Mancanegara. Crafted with Passion 💖
    <div style="margin-top: 5px; display: flex; justify-content: center; align-items: center; gap: 10px; flex-wrap: wrap;">
        <span style="font-size: 0.8rem; opacity: 0.7;">Development by <a href="https://www.instagram.com/_mochalifsurya14_/" target="_blank" style="color: inherit; text-decoration: underline; font-weight: 600;">Moch Alif Surya Ramadhan</a></span>
        <span style="opacity: 0.3;">|</span>
        <a href="{{ route('admin.login') }}" style="font-size: 0.8rem; opacity: 0.6; font-weight: 500; color: var(--accent); display: flex; align-items: center; gap: 5px;">
            <svg viewBox="0 0 24 24" style="width: 14px; height: 14px; fill: currentColor;"><path d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9V6zm9 14H6V10h12v10zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2-2 .9-2 2 .9 2 2 2z"/></svg>
            Login
        </a>
    </div>
  </footer>

  @yield('scripts')
</body>
</html>
