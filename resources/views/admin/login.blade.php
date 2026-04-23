<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin | Resep Mancanegara</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary: #ff69b4;
      --primary-dark: #d63384;
      --accent: #6a1b4d;
      --bg-gradient: linear-gradient(135deg, #ffc1dc 0%, #ff8bb3 100%);
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Plus Jakarta Sans', sans-serif;
      background: var(--bg-gradient);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
      color: var(--accent);
    }

    .login-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(20px);
      -webkit-backdrop-filter: blur(20px);
      padding: 50px 40px;
      border-radius: 40px;
      width: 100%;
      max-width: 450px;
      box-shadow: 0 25px 50px rgba(255, 105, 180, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.4);
      animation: zoomIn 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
    }

    @keyframes zoomIn {
      from { opacity: 0; transform: scale(0.9); }
      to { opacity: 1; transform: scale(1); }
    }

    .login-header {
      text-align: center;
      margin-bottom: 40px;
    }

    .login-header h2 {
      font-size: 2.2rem;
      font-weight: 800;
      color: var(--accent);
      letter-spacing: -1px;
    }

    .login-header p {
      color: #888;
      margin-top: 8px;
      font-weight: 500;
    }

    .error-box {
      background: #fff5f5;
      color: #e53e3e;
      padding: 15px;
      border-radius: 16px;
      margin-bottom: 30px;
      font-size: 0.9rem;
      font-weight: 600;
      border: 1px solid #fed7d7;
      text-align: center;
    }

    .form-group {
      margin-bottom: 25px;
    }

    .form-group label {
      display: block;
      font-size: 0.85rem;
      font-weight: 700;
      margin-bottom: 10px;
      text-transform: uppercase;
      letter-spacing: 1px;
      color: var(--primary-dark);
    }

    .input-container {
      position: relative;
    }

    .input-container svg {
      position: absolute;
      left: 18px;
      top: 50%;
      transform: translateY(-50%);
      width: 20px;
      height: 20px;
      fill: var(--primary);
      transition: all 0.3s ease;
    }

    .input-field {
      width: 100%;
      padding: 16px 16px 16px 50px;
      border-radius: 18px;
      border: 2px solid #fff0f6;
      background: white;
      font-family: inherit;
      font-size: 1rem;
      font-weight: 600;
      color: var(--accent);
      transition: all 0.3s ease;
    }

    .input-field:focus {
      outline: none;
      border-color: var(--primary);
      box-shadow: 0 0 0 5px rgba(255, 105, 180, 0.1);
    }

    .input-field:focus + svg {
      fill: var(--primary-dark);
    }

    .password-toggle {
      position: absolute;
      right: 18px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      background: none;
      border: none;
      padding: 0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary);
      transition: color 0.3s ease;
    }

    .password-toggle:hover {
      color: var(--primary-dark);
    }

    .login-btn {
      width: 100%;
      padding: 18px;
      border: none;
      border-radius: 20px;
      background: var(--primary);
      color: white;
      font-size: 1.1rem;
      font-weight: 800;
      cursor: pointer;
      box-shadow: 0 10px 25px rgba(255, 105, 180, 0.3);
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      margin-top: 10px;
    }

    .login-btn:hover {
      background: var(--primary-dark);
      transform: translateY(-3px);
      box-shadow: 0 15px 30px rgba(255, 105, 180, 0.4);
    }

    .footer-links {
      text-align: center;
      margin-top: 30px;
    }

    .footer-links a {
      color: var(--primary-dark);
      text-decoration: none;
      font-weight: 700;
      font-size: 0.9rem;
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 40px 25px;
      }
    }
  </style>
</head>
<body>
  <div class="login-card">
    <div class="login-header">
      <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 120px; height: auto; margin-bottom: 20px;">
      <h2>Admin Login</h2>
      <p>Masuk ke dashboard pengelola resep</p>
    </div>

    @if($errors->any())
      <div class="error-box">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      
      <div class="form-group">
        <label for="email">Alamat Email</label>
        <div class="input-container">
          <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16a2 2 0 002-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
          <input type="email" id="email" name="email" class="input-field" required autofocus placeholder="Masukkan email" value="{{ old('email') }}" />
        </div>
      </div>

      <div class="form-group">
        <label for="password">Kata Sandi</label>
        <div class="input-container">
          <svg viewBox="0 0 24 24"><path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-7h-1V7a5 5 0 10-10 0v3H6a2 2 0 00-2 2v7a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2zm-7-3a3 3 0 016 0v3H11V7z"/></svg>
          <input type="password" id="password" name="password" class="input-field" required placeholder="••••••••" style="padding-right: 50px;" />
          <button type="button" id="togglePassword" class="password-toggle">
            <svg id="eyeIcon" viewBox="0 0 24 24" style="position: static; transform: none; width: 22px; height: 22px;"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
          </button>
        </div>
      </div>

      <button type="submit" class="login-btn">Masuk Sekarang</button>
    </form>

    <div class="footer-links">
      <a href="{{ route('home') }}">← Kembali ke Beranda</a>
    </div>
  </div>

  <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function (e) {
      // toggle the type attribute
      const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
      password.setAttribute('type', type);
      
      // toggle the eye icon
      if (type === 'text') {
        eyeIcon.innerHTML = '<path d="M12 7c2.76 0 5 2.24 5 5 0 .65-.13 1.26-.36 1.83l2.92 2.92c1.51-1.26 2.7-2.89 3.43-4.75-1.73-4.39-6-7.5-11-7.5-1.4 0-2.74.25-3.98.7l2.16 2.16C10.74 7.13 11.35 7 12 7zM2 4.27l2.28 2.28.46.46C3.08 8.3 1.78 10.02 1 12c1.73 4.39 6 7.5 11 7.5 1.55 0 3.03-.3 4.38-.84l.42.42L19.73 22 21 20.73 3.27 3 2 4.27zM7.53 9.8l1.55 1.55c-.05.21-.08.43-.08.65 0 1.66 1.34 3 3 3 .22 0 .44-.03.65-.08l1.55 1.55c-.67.33-1.41.53-2.2.53-2.76 0-5-2.24-5-5 0-.79.2-1.53.53-2.2zm4.31-.78l3.15 3.15.02-.16c0-1.66-1.34-3-3-3l-.17.01z"/>';
      } else {
        eyeIcon.innerHTML = '<path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/>';
      }
    });
  </script>
</body>
</html>
