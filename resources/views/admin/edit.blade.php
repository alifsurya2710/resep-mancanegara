<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Resep: {{ $resep->nama }}</title>
    <style>
        /* Reset dan font */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f9d6e3 0%, #fcb1c4 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            margin: 0;
            min-height: 100vh;
        }
        .form-container {
            background-color: #fff0f6;
            padding: 40px 45px;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(255, 105, 180, 0.2);
            width: 420px;
            transition: box-shadow 0.3s ease;
        }
        .form-container:hover {
            box-shadow: 0 12px 40px rgba(255, 20, 147, 0.4);
        }
        h2 {
            margin-bottom: 30px;
            color: #d6336c;
            font-weight: 900;
            font-size: 28px;
            text-align: center;
            letter-spacing: 1px;
            text-transform: uppercase;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 700;
            color: #a8326f;
            font-size: 15px;
            user-select: none;
        }
        input[type="text"],
        input[type="url"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 12px 16px;
            margin-bottom: 22px;
            border: 2px solid #f3a6c9;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 500;
            color: #6a1b4d;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
            resize: vertical;
            font-family: inherit;
            background-color: #fff0f6;
        }
        input[type="text"]:focus,
        input[type="url"]:focus,
        textarea:focus,
        input[type="file"]:focus {
            border-color: #d6336c;
            box-shadow: 0 0 8px rgba(214, 51, 108, 0.5);
            outline: none;
            background-color: #ffe6f0;
        }
        textarea {
            min-height: 110px;
            line-height: 1.5;
        }
        img {
            display: block;
            margin: 10px 0 25px 0;
            border-radius: 12px;
            box-shadow: 0 4px 14px rgba(214, 51, 108, 0.2);
            max-width: 100%;
            height: auto;
            border: 2px solid #d6336c;
        }
        button {
            background-color: #d6336c;
            color: white;
            font-weight: 800;
            border: none;
            padding: 14px 0;
            width: 100%;
            border-radius: 12px;
            font-size: 18px;
            cursor: pointer;
            box-shadow: 0 6px 20px rgba(214, 51, 108, 0.5);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
            user-select: none;
        }
        button:hover {
            background-color: #a8326f;
            box-shadow: 0 8px 28px rgba(168, 50, 111, 0.7);
        }
        button:focus {
            outline: none;
            box-shadow: 0 0 10px 3px rgba(214, 51, 108, 0.7);
        }
        .btn-cancel {
            display: block;
            margin: 20px auto 0 auto;
            width: 100%;
            padding: 14px 0;
            border-radius: 12px;
            font-weight: 700;
            color: #a8326f;
            text-align: center;
            text-decoration: none;
            border: 2px solid #f3a6c9;
            background-color: #fff0f6;
            transition: all 0.3s ease;
            user-select: none;
        }
        .btn-cancel:hover {
            color: #fff;
            background-color: #d6336c;
            border-color: #d6336c;
            box-shadow: 0 5px 18px rgba(214, 51, 108, 0.6);
        }
        /* Responsive */
        @media (max-width: 480px) {
            .form-container {
                width: 100%;
                padding: 30px 25px;
                border-radius: 12px;
            }
            h2 {
                font-size: 24px;
                margin-bottom: 20px;
            }
            button, .btn-cancel {
                font-size: 16px;
                padding: 12px 0;
            }
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Edit Resep: {{ $resep->nama }}</h2>

        <form method="POST" action="{{ route('admin.resep.update', $resep->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="nama">Nama Makanan:</label>
            <input type="text" id="nama" name="nama" value="{{ old('nama', $resep->nama) }}" required autofocus>

            <label for="asal_negara">Asal Negara:</label>
            <input type="text" id="asal_negara" name="asal_negara" value="{{ old('asal_negara', $resep->asal_negara) }}" required>

            <label for="pencipta">Pencipta:</label>
            <input type="text" id="pencipta" name="pencipta" value="{{ old('pencipta', $resep->pencipta) }}" required>

            <label for="cara_membuat">Cara Membuat:</label>
            <textarea id="cara_membuat" name="cara_membuat" required>{{ old('cara_membuat', $resep->cara_membuat) }}</textarea>

            <label for="link_youtube">Link YouTube:</label>
            <input type="url" id="link_youtube" name="link_youtube" value="{{ old('link_youtube', $resep->link_youtube) }}">

            <label>Gambar Saat Ini:</label>
            <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar {{ $resep->nama }}">

            <label for="gambar">Ganti Gambar (opsional):</label>
            <input type="file" id="gambar" name="gambar" accept="image/*">

            <button type="submit">Perbarui</button>
            <a href="{{ route('admin.dashboard') }}" class="btn-cancel">Batal</a>
        </form>
    </div>
</body>
</html>
