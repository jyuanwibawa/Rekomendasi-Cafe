<h1>Tambah Cafe</h1>

<form action="{{ route('admin.cafes.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="nama_cafe">Nama Cafe:</label>
    <input type="text" name="nama_cafe" id="nama_cafe" value="{{ old('nama_cafe') }}" required>

    <label for="foto_cafe">Foto Cafe:</label>
    <input type="file" name="foto_cafe" id="foto_cafe" accept="image/*">

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" id="alamat" rows="3" required>{{ old('alamat') }}</textarea>

    <label for="range_harga">Range Harga:</label>
    <input type="text" name="range_harga" id="range_harga" value="{{ old('range_harga') }}" required>

    <label for="jam_buka">Jam Buka:</label>
    <input type="time" name="jam_buka" id="jam_buka" value="{{ old('jam_buka') }}" required>

    <label for="jam_tutup">Jam Tutup:</label>
    <input type="time" name="jam_tutup" id="jam_tutup" value="{{ old('jam_tutup') }}" required>

    <label for="kecepatan_wifi">Kecepatan Wi-Fi (Mbps):</label>
    <input type="number" name="kecepatan_wifi" id="kecepatan_wifi" value="{{ old('kecepatan_wifi') }}" required>

    <label for="kategori_cafe">Kategori Cafe:</label>
    <select name="kategori_cafe" id="kategori_cafe" required>
        <option value="">-- Pilih Kategori --</option>
        <option value="mood" {{ old('kategori_cafe') === 'mood' ? 'selected' : '' }}>Mood</option>
        <option value="agenda" {{ old('kategori_cafe') === 'agenda' ? 'selected' : '' }}>Agenda</option>
    </select>

    <label for="nama_kategori">Nama Kategori:</label>
    <select name="nama_kategori" id="nama_kategori" required>
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

    <button type="submit">Simpan</button>
</form>
