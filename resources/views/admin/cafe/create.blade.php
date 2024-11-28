<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Cafe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            margin-bottom: 5px;
        }

        .form-input,
        .form-textarea,
        .form-select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        .form-textarea {
            resize: vertical;
        }

        .form-input[type="file"] {
            padding: 5px;
        }

        button[type="submit"] {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background-color: #6d4c41;
            color: white;
            font-size: 16px;
            text-align: center;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #3e2723;
        }

        .form-group select,
        .form-group input[type="number"],
        .form-group input[type="time"],
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .form-group button {
            margin-top: 10px;
            padding: 12px;
            background-color: #4caf50;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        .form-group button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="form-title">Tambah Cafe</h1>

        <form action="{{ route('admin.cafes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="nama_cafe">Nama Cafe:</label>
                <input type="text" name="nama_cafe" id="nama_cafe" class="form-input" value="{{ old('nama_cafe') }}" required>
            </div>

            <div class="form-group">
                <label for="foto_cafe">Foto Cafe:</label>
                <input type="file" name="foto_cafe" id="foto_cafe" class="form-input" accept="image/*">
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea name="alamat" id="alamat" class="form-textarea" rows="3" required>{{ old('alamat') }}</textarea>
            </div>

            <div class="form-group">
                <label for="range_harga">Range Harga:</label>
                <input type="text" name="range_harga" id="range_harga" class="form-input" value="{{ old('range_harga') }}" required>
            </div>

            <div class="form-group">
                <label for="jam_buka">Jam Buka:</label>
                <input type="time" name="jam_buka" id="jam_buka" class="form-input" value="{{ old('jam_buka') }}" required>
            </div>

            <div class="form-group">
                <label for="jam_tutup">Jam Tutup:</label>
                <input type="time" name="jam_tutup" id="jam_tutup" class="form-input" value="{{ old('jam_tutup') }}" required>
            </div>

            <div class="form-group">
                <label for="kecepatan_wifi">Kecepatan Wi-Fi (Mbps):</label>
                <input type="number" name="kecepatan_wifi" id="kecepatan_wifi" class="form-input" value="{{ old('kecepatan_wifi') }}" required>
            </div>

            <div class="form-group">
                <label for="kategori_cafe">Kategori Cafe:</label>
                <select name="kategori_cafe" id="kategori_cafe" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="mood" {{ old('kategori_cafe') === 'mood' ? 'selected' : '' }}>Mood</option>
                    <option value="agenda" {{ old('kategori_cafe') === 'agenda' ? 'selected' : '' }}>Agenda</option>
                </select>
            </div>

            <div class="form-group">
                <label for="nama_kategori">Nama Kategori:</label>
                <select name="nama_kategori" id="nama_kategori" class="form-select" required>
                    <option value="">-- Pilih Nama Kategori --</option>
                    @foreach($moods as $mood)
                        <option value="{{ $mood->nama_kategori_mood }}" {{ old('nama_kategori') === $mood->nama_kategori_mood ? 'selected' : '' }} data-id="{{ $mood->id_mood }}">
                            {{ $mood->nama_kategori_mood }}
                        </option>
                    @endforeach
                    @foreach($agendas as $agenda)
                        <option value="{{ $agenda->nama_kategori_agenda }}" {{ old('nama_kategori') === $agenda->nama_kategori_agenda ? 'selected' : '' }} data-id="{{ $agenda->id_agenda }}">
                            {{ $agenda->nama_kategori_agenda }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>
