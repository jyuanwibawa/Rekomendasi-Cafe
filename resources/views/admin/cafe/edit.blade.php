
<h1>Edit Cafe</h1>

<form action="{{ route('admin.cafes.update', $cafe->id_cafe) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label for="nama_cafe">Nama Cafe:</label>
    <input type="text" name="nama_cafe" id="nama_cafe" value="{{ $cafe->nama_cafe }}" required>

    <label for="foto_cafe">Foto Cafe:</label>
    <input type="file" name="foto_cafe" id="foto_cafe" accept="image/*">
    @if($cafe->foto_cafe)
        <img src="{{ asset('storage/' . $cafe->foto_cafe) }}" alt="{{ $cafe->nama_cafe }}" style="max-width: 150px;">
    @endif

    <label for="alamat">Alamat:</label>
    <textarea name="alamat" id="alamat" rows="3" required>{{ $cafe->alamat }}</textarea>

    <label for="range_harga">Range Harga:</label>
    <input type="text" name="range_harga" id="range_harga" value="{{ $cafe->range_harga }}" required>

    <label for="jam_buka">Jam Buka:</label>
    <input type="time" name="jam_buka" id="jam_buka" value="{{ $cafe->jam_buka }}" required>

    <label for="jam_tutup">Jam Tutup:</label>
    <input type="time" name="jam_tutup" id="jam_tutup" value="{{ $cafe->jam_tutup }}" required>

    <label for="kecepatan_wifi">Kecepatan Wi-Fi (Mbps):</label>
    <input type="number" name="kecepatan_wifi" id="kecepatan_wifi" value="{{ $cafe->kecepatan_wifi }}" required>

    <label for="kategori_cafe">Kategori Cafe:</label>
    <select name="kategori_cafe" id="kategori_cafe" required>
        <option value="mood" {{ $cafe->kategori_cafe === 'mood' ? 'selected' : '' }}>Mood</option>
        <option value="agenda" {{ $cafe->kategori_cafe === 'agenda' ? 'selected' : '' }}>Agenda</option>
    </select>

    <label for="nama_kategori">Nama Kategori:</label>
    <select name="nama_kategori" id="nama_kategori" required>
        <option value="">-- Pilih Nama Kategori --</option>
        @foreach($moods as $mood)
            <option value="{{ $mood->nama_kategori_mood }}" {{ $cafe->nama_kategori === $mood->nama_kategori_mood ? 'selected' : '' }}>
                {{ $mood->nama_kategori_mood }}
            </option>
        @endforeach
        @foreach($agendas as $agenda)
            <option value="{{ $agenda->nama_kategori_agenda }}" {{ $cafe->nama_kategori === $agenda->nama_kategori_agenda ? 'selected' : '' }}>
                {{ $agenda->nama_kategori_agenda }}
            </option>
        @endforeach
    </select>

    <button type="submit">Update</button>
</form>

