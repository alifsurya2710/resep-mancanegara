<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard Admin</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap');

        body {
            font-family: 'Inter', Arial, sans-serif;
            background: #ffe6f0;
            margin: 0;
            padding: 30px 15px;
            color: #4a2a42;
        }
        h2 {
            text-align: center;
            color: #d43e6f;
            margin-bottom: 25px;
            font-weight: 700;
            font-size: 2.2rem;
            letter-spacing: 1px;
            user-select: none;
        }
        .message-success {
            max-width: 600px;
            margin: 0 auto 20px auto;
            background-color: #fce4ec;
            border: 2px solid #d43e6f;
            color: #d43e6f;
            padding: 15px 20px;
            border-radius: 8px;
            font-weight: 600;
            text-align: center;
            box-shadow: 0 0 8px rgba(212, 62, 111, 0.3);
            user-select: none;
        }
        .top-actions {
            max-width: 900px;
            margin: 0 auto 30px auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }
        .top-actions a {
            background-color: #d43e6f;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        .top-actions a:hover {
            background-color: #b4325a;
        }
        .top-actions form button {
            background-color: #ff6699;
            border: none;
            color: white;
            padding: 10px 22px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        .top-actions form button:hover {
            background-color: #cc527a;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: white;
            box-shadow: 0 5px 15px rgba(212, 62, 111, 0.2);
            border-radius: 12px;
            overflow: hidden;
        }
        thead {
            background-color: #d43e6f;
            color: white;
            user-select: none;
        }
        th, td {
            padding: 14px 18px;
            text-align: left;
            vertical-align: middle;
            border-bottom: 1px solid #ffd1e4;
        }
        tbody tr:hover {
            background-color: #ffe6f0;
        }
        td img {
            border-radius: 8px;
            max-width: 100px;
            height: auto;
            display: block;
            object-fit: cover;
        }
        td a.edit-btn {
            background-color: #ff85a2;
            color: white;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            margin-right: 8px;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        td a.edit-btn:hover {
            background-color: #e6748e;
        }
        td form button.delete-btn {
            background-color: #f75c7a;
            border: none;
            color: white;
            padding: 6px 14px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease;
            user-select: none;
        }
        td form button.delete-btn:hover {
            background-color: #cc4b66;
        }

        @media (max-width: 600px) {
            .top-actions {
                flex-direction: column;
                gap: 10px;
            }
            table, thead, tbody, th, td, tr {
                display: block;
            }
            thead tr {
                display: none;
            }
            tbody tr {
                margin-bottom: 20px;
                background: #fff0f6;
                border-radius: 10px;
                padding: 15px;
            }
            tbody td {
                padding: 10px 15px;
                position: relative;
                padding-left: 50%;
                text-align: right;
                border: none;
            }
            tbody td::before {
                position: absolute;
                top: 10px;
                left: 15px;
                width: 45%;
                white-space: nowrap;
                font-weight: 700;
                color: #a62f56;
                content: attr(data-label);
                text-align: left;
                user-select: none;
            }
            td img {
                max-width: 80px;
                margin-bottom: 10px;
            }
            td a.edit-btn, td form button.delete-btn {
                margin: 0 5px 10px 0;
                padding: 8px 12px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <h2>Dashboard Admin</h2>

    @if(session('success'))
        <div class="message-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="top-actions">
        <a href="{{ route('admin.resep.create') }}">Tambah Resep</a>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Makanan</th>
                <th>Asal Negara</th>
                <th>Pencipta</th>
                <th>Cara Membuat & Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reseps as $resep)
            <tr>
                <td data-label="Gambar">
                    <img src="{{ asset('storage/' . $resep->gambar) }}" alt="Gambar {{ $resep->nama }}">
                </td>
                <td data-label="Nama Makanan">{{ $resep->nama }}</td>
                <td data-label="Asal Negara">{{ $resep->asal_negara }}</td>
                <td data-label="Pencipta">{{ $resep->pencipta }}</td>
                <td data-label="Cara Membuat & Aksi">
                    {{ \Illuminate\Support\Str::limit($resep->cara_membuat, 100, '...') }}<br /><br />
                    <a href="{{ route('admin.resep.edit', $resep->id) }}" class="edit-btn">Edit</a>
                    <form method="POST" action="{{ route('admin.resep.destroy', $resep->id) }}" style="display:inline;">
                        @csrf 
                        @method('DELETE')
                        <button onclick="return confirm('Yakin hapus resep ini?')" type="submit" class="delete-btn">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
