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

    .btn-delete {
        display: inline-block;
        width: 100%;
        padding: 12px;
        background-color: #f44336;
        color: white;
        font-size: 16px;
        text-align: center;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
        margin-top: 10px;
    }

    .btn-delete:hover {
        background-color: #d32f2f;
    }

    .btn-cancel {
        display: inline-block;
        padding: 12px;
        margin-top: 10px;
        background-color: #ddd;
        color: black;
        font-size: 16px;
        text-align: center;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .btn-cancel:hover {
        background-color: #bbb;
    }
</style>
<div class="container">
    <h1 class="form-title">Edit Kategori Agenda</h1>
    <form action="{{ route('admin.agendas.update', $agenda->id_agenda) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nama_kategori_agenda">Nama Kategori</label>
            <input type="text" name="nama_kategori_agenda" id="nama_kategori_agenda" class="form-input" value="{{ $agenda->nama_kategori_agenda }}" required>
        </div>
        <div class="form-group">
            <label for="foto_agenda">Foto Kategori</label>
            <input type="file" name="foto_agenda" id="foto_agenda" class="form-input">
            @if($agenda->foto_agenda)
                <p>Foto saat ini: {{ $agenda->foto_agenda }}</p>
                <img src="{{ asset('storage/' . $agenda->foto_agenda) }}" alt="Foto Kategori" style="width: 100px;">
            @endif
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>

    <!-- Form untuk menghapus data -->
    <form action="{{ route('admin.agendas.destroy', $agenda->id_agenda) }}" method="POST" style="margin-top: 20px;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn-delete" onclick="return confirm('Yakin ingin menghapus kategori agenda ini?')">Hapus</button>
    </form>

    <a href="{{ route('admin.agendas.index') }}" class="btn-cancel">Batal</a>
</div>

