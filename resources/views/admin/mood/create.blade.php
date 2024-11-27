
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 100%;
            max-width: 500px;
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

        .form-input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-top: 5px;
        }

        .btn-submit {
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

        .btn-submit:hover {
            background-color: #3e2723;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1 class="form-title">Tambah Kategori</h1>
        <form action="{{ route('admin.moods.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nama_kategori_mood">Nama Kategori</label>
                <input type="text" name="nama_kategori_mood" id="nama_kategori_mood" class="form-input" placeholder="Cth. Tenang, Ramai" required>
            </div>
            <div class="form-group">
                <label for="foto_mood">Foto Kategori</label>
                <input type="file" name="foto_mood" id="foto_mood" class="form-input" required>
            </div>
            <button type="submit" class="btn-submit">Kirim</button>
        </form>
    </div>
</body>
</html>