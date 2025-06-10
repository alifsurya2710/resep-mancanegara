<!-- resources/views/admin/login.blade.php -->
<!DOCTYPE html>
<html lang="id" >
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

    * {
      box-sizing: border-box;
    }
    body {
      font-family: 'Inter', Arial, sans-serif;
      background: linear-gradient(135deg, #ff85a2 0%, #ff4d81 100%);
      height: 100vh;
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 15px;
    }
    .login-container {
      background: #fff;
      padding: 40px 35px;
      border-radius: 14px;
      width: 360px;
      box-shadow: 0 15px 40px rgba(255, 77, 129, 0.3);
      transition: box-shadow 0.3s ease;
    }
    .login-container:hover {
      box-shadow: 0 20px 50px rgba(255, 77, 129, 0.5);
    }
    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      color: #d43e6f;
      letter-spacing: 1.2px;
      font-size: 28px;
      user-select: none;
    }
    .error-message {
      background-color: #ffe3ec;
      color: #d43e6f;
      padding: 12px 15px;
      border-radius: 8px;
      margin-bottom: 25px;
      font-weight: 600;
      text-align: center;
      box-shadow: 0 0 8px rgba(212, 62, 111, 0.3);
      user-select: none;
    }
    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }
    label {
      font-weight: 600;
      color: #a62f56;
      margin-bottom: 6px;
      display: block;
      user-select: none;
    }
    .input-wrapper {
      position: relative;
      display: flex;
      align-items: center;
    }
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 12px 12px 12px 40px;
      font-size: 15px;
      border: 2px solid #f9b2ca;
      border-radius: 8px;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
      font-family: inherit;
    }
    input[type="email"]:focus,
    input[type="password"]:focus {
      border-color: #ff4d81;
      box-shadow: 0 0 8px rgba(255, 77, 129, 0.4);
      outline: none;
    }
    /* Icons inside inputs */
    .input-wrapper svg {
      position: absolute;
      left: 12px;
      width: 20px;
      height: 20px;
      fill: #ff4d81;
      pointer-events: none;
    }
    button {
      padding: 14px 0;
      border: none;
      background-color: #ff4d81;
      color: white;
      font-weight: 700;
      font-size: 17px;
      border-radius: 10px;
      cursor: pointer;
      transition: background-color 0.3s ease, box-shadow 0.25s ease;
      user-select: none;
      box-shadow: 0 8px 18px rgba(255, 77, 129, 0.4);
    }
    button:hover {
      background-color: #e63e6d;
      box-shadow: 0 10px 22px rgba(230, 62, 109, 0.6);
    }
    button:focus {
      outline: none;
      box-shadow: 0 0 0 3px rgba(255, 77, 129, 0.6);
    }

    @media (max-width: 400px) {
      .login-container {
        width: 100%;
        padding: 30px 25px;
      }
      h2 {
        font-size: 24px;
      }
    }
  </style>
</head>
<body>
  <div class="login-container">
    <h2>Login Admin</h2>

    @if($errors->any())
      <div class="error-message">
        {{ $errors->first() }}
      </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
      @csrf
      <label for="email">Email:</label>
      <div class="input-wrapper">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18a2 2 0 002 2h16a2 2 0 002-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
        <input type="email" id="email" name="email" required autofocus autocomplete="username" placeholder="email@example.com" />
      </div>

      <label for="password">Password:</label>
      <div class="input-wrapper">
        <svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 17a2 2 0 100-4 2 2 0 000 4zm6-7h-1V7a5 5 0 10-10 0v3H6a2 2 0 00-2 2v7a2 2 0 002 2h12a2 2 0 002-2v-7a2 2 0 00-2-2zm-7-3a3 3 0 016 0v3H11V7z"/></svg>
        <input type="password" id="password" name="password" required autocomplete="current-password" placeholder="••••••••" />
      </div>

      <button type="submit">Login</button>
    </form>
  </div>
</body>
</html>
