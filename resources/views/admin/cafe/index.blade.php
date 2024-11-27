<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Cafe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .main-content {
            margin-left: 250px; /* Menyesuaikan untuk sidebar */
            padding: 20px;
            margin-top: 70px; /* Menyesuaikan untuk navbar */
        }

        .container {
            margin: auto;
            max-width: 1200px;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: #6d4c41;
            color: white;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        .btn {
            padding: 8px 12px;
            font-size: 14px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            color: white;
        }

        .btn-edit {
            background-color: #007bff;
        }

        .btn-edit:hover {
            background-color: #0056b3;
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #a71d2a;
        }

        .add-button {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-size: 16px;
        }

        .add-button:hover {
            background-color: #218838;
        }

        img {
            max-width: 100px;
            height: 80px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    @include('layouts.navbaradmin')
    <div class="main-content">
        <div class="container">
            <h1 class="title">Daftar Cafe</h1>

            <!-- Tombol Tambah -->
            <a href="{{ route('admin.cafes.create') }}" class="add-button">Tambah Cafe</a>

            <!-- Tabel Cafe -->
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama Cafe</th>
                        <th>Alamat</th>
                        <th>Range Harga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($cafes as $index => $cafe)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            {{-- {{ dd(asset('storage/' . $cafe->foto_cafe)) }} --}}
                            <img src="{{ asset('storage/' . $cafe->foto_cafe) }}">
                        </td>
                        
                        <td>{{ $cafe->nama_cafe }}</td>
                        <td>{{ $cafe->alamat }}</td>
                        <td>{{ $cafe->range_harga }}</td>
                        <td class="action-buttons">
                            <a href="{{ route('admin.cafes.edit', $cafe->id_cafe) }}" class="btn btn-edit">Edit</a>
                            <form action="{{ route('admin.cafes.destroy', $cafe->id_cafe) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete" onclick="return confirm('Apakah Anda yakin ingin menghapus cafe ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">Belum ada data cafe.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
