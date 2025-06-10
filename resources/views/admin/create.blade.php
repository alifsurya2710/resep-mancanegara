<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Tambah Resep Baru</title>
<style>
    /* Reset sederhana */
    * {
        box-sizing: border-box;
    }
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: linear-gradient(135deg, #ffd1e8 0%, #ff9ac1 100%);
        min-height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px 15px;
        margin: 0;
        color: #5a2a4a;
    }
    .form-container {
        background-color: #fff0f6;
        padding: 35px 40px 40px 40px;
        border-radius: 12px;
        box-shadow: 0 12px 25px rgba(255, 105, 150, 0.25);
        width: 100%;
        max-width: 450px;
        transition: box-shadow 0.3s ease;
    }
    .form-container:hover {
        box-shadow: 0 16px 35px rgba(255, 105, 150, 0.4);
    }
    h2 {
        margin-bottom: 30px;
        color: #d43e6f;
        font-weight: 800;
        font-size: 28px;
        text-align: center;
        letter-spacing: 1px;
        text-transform: uppercase;
        user-select: none;
    }
    label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #a63d68;
        letter-spacing: 0.03em;
        font-size: 15px;
        user-select: none;
    }
    input[type="text"],
    input[type="url"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 12px 14px;
        margin-bottom: 22px;
        border: 2px solid #f7c6d0;
        border-radius: 8px;
        font-size: 16px;
        font-weight: 500;
        color: #5a2a4a;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        resize: vertical;
        font-family: inherit;
    }
    input[type="text"]:focus,
    input[type="url"]:focus,
    textarea:focus,
    input[type="file"]:focus {
        border-color: #d43e6f;
        box-shadow: 0 0 8px rgba(212, 62, 111, 0.4);
        outline: none;
    }
    textarea {
        min-height: 120px;
        line-height: 1.5;
    }

    /* Tombol Simpan dengan ripple effect */
    button {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding: 14px 0;
        font-size: 17px;
        font-weight: 700;
        color: white;
        border: none;
        border-radius: 12px;
        background-color: #d43e6f;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(212, 62, 111, 0.6);
        transition: background-color 0.3s ease;
        user-select: none;
    }
    button:hover {
        background-color: #b0325a;
    }
    button:focus {
        outline: none;
    }
    button .ripple {
        position: absolute;
        border-radius: 50%;
        transform: scale(0);
        animation: rippleEffect 0.6s linear;
        background-color: rgba(255,255,255,0.7);
        pointer-events: none;
    }
    @keyframes rippleEffect {
        to {
            transform: scale(4);
            opacity: 0;
        }
    }

    .btn-cancel {
        display: block;
        margin: 20px auto 0 auto;
        width: 100%;
        padding: 14px 0;
        border-radius: 12px;
        font-weight: 600;
        color: #a63d68;
        text-align: center;
        text-decoration: none;
        border: 2px solid #f7c6d0;
        background-color: #fff0f6;
        transition: all 0.3s ease;
        user-select: none;
    }
    .btn-cancel:hover {
        color: #d43e6f;
        border-color: #d43e6f;
        background-color: #ffe3f0;
    }

    /* Responsive adjustments */
    @media (max-width: 480px) {
        .form-container {
            padding: 30px 25px 35px 25px;
            width: 100%;
            max-width: 100%;
        }
        h2 {
            font-size: 24px;
        }
    }
</style>
</head>
<body>
    <div class="form-container">
        <h2>Tambah Resep Baru</h2>
        <form method="POST" action="{{ route('admin.resep.store') }}" enctype="multipart/form-data">
            @csrf

            <label for="nama">Nama Makanan:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama') }}" required autofocus>

            <label for="asal_negara">Asal Negara:</label>
            <input type="text" id="asal_negara" name="asal_negara" value="{{ old('asal_negara') }}" required>

            <label for="pencipta">Pencipta:</label>
            <input type="text" id="pencipta" name="pencipta" value="{{ old('pencipta') }}" required>

            <label for="cara_membuat">Cara Membuat:</label>
            <textarea id="cara_membuat" name="cara_membuat" required>{{ old('cara_membuat') }}</textarea>

            <label for="link_youtube">Link YouTube:</label>
            <input type="url" id="link_youtube" name="link_youtube" value="{{ old('link_youtube') }}">

            <label for="gambar">Gambar:</label>
            <input type="file" id="gambar" name="gambar" accept="image/*" required>

            <button type="submit">Simpan Resep</button>
            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Batal</a>
        </form>
    </div>

    <script>
    // Ripple effect on button click
    document.querySelector('button[type="submit"]').addEventListener('click', function (e) {
        const button = e.currentTarget;
        const circle = document.createElement('span');
        circle.classList.add('ripple');
        const rect = button.getBoundingClientRect();
        circle.style.width = circle.style.height = Math.max(rect.width, rect.height) + 'px';
        circle.style.left = (e.clientX - rect.left - (circle.offsetWidth / 2)) + 'px';
        circle.style.top = (e.clientY - rect.top - (circle.offsetHeight / 2)) + 'px';
        button.appendChild(circle);
        setTimeout(() => circle.remove(), 600);
    });
    </script>
</body>
</html>
