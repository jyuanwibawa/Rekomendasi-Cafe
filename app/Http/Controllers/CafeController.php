<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cafe;
use App\Models\Mood;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CafeController extends Controller
{
    public function index()
    {
        // Mengambil semua data cafe
        $cafes = Cafe::all();
        return view('admin.cafe.index', compact('cafes'));
    }

    public function create()
    {
        // Mengambil data mood dan agenda untuk form tambah cafe
        $moods = Mood::all();
        $agendas = Agenda::all();
        return view('admin.cafe.create', compact('moods', 'agendas'));
    }

    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama_cafe' => 'required|string|max:255',
            'foto_cafe' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
            'range_harga' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kecepatan_wifi' => 'required|integer',
            'kategori_cafe' => 'required|in:agenda,mood',
            'nama_kategori' => 'required',
        ]);

        // Cek apakah kategori yang dipilih valid
        if ($request->kategori_cafe === 'mood') {
            $exists = Mood::where('nama_kategori_mood', $request->nama_kategori)->exists();
        } elseif ($request->kategori_cafe === 'agenda') {
            $exists = Agenda::where('nama_kategori_agenda', $request->nama_kategori)->exists();
        } else {
            $exists = false;
        }

        if (!$exists) {
            return back()->withErrors(['nama_kategori' => 'Nama kategori tidak valid untuk kategori yang dipilih.']);
        }

        // Simpan foto cafe ke folder 'public/cafe'
        $fotoPath = $request->file('foto_cafe')
            ? $request->file('foto_cafe')->store('cafe', 'public')
            : null;

        // Menambahkan data cafe ke database
        Cafe::create(array_merge($validated, ['foto_cafe' => $fotoPath]));

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil ditambahkan');
    }

    public function edit(Cafe $cafe)
    {
        // Mengambil data mood dan agenda untuk form edit cafe
        $moods = Mood::all();
        $agendas = Agenda::all();
        return view('admin.cafe.edit', compact('cafe', 'moods', 'agendas'));
    }

    public function update(Request $request, Cafe $cafe)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'nama_cafe' => 'required|string|max:255',
            'foto_cafe' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required',
            'range_harga' => 'required',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kecepatan_wifi' => 'required|integer',
            'kategori_cafe' => 'required|in:agenda,mood',
            'nama_kategori' => 'required',
        ]);

        // Jika ada gambar baru, hapus gambar lama (jika ada)
        if ($request->file('foto_cafe') && $cafe->foto_cafe) {
            Storage::disk('public')->delete($cafe->foto_cafe);
        }

        // Simpan foto cafe baru atau gunakan foto lama
        $fotoPath = $request->file('foto_cafe')
            ? $request->file('foto_cafe')->store('cafe', 'public')
            : $cafe->foto_cafe;

        // Update data cafe
        $cafe->update(array_merge($validated, ['foto_cafe' => $fotoPath]));

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil diperbarui');
    }

    public function destroy(Cafe $cafe)
    {
        // Hapus foto cafe jika ada
        if ($cafe->foto_cafe) {
            Storage::disk('public')->delete($cafe->foto_cafe);
        }

        // Hapus data cafe dari database
        $cafe->delete();

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil dihapus');
    }
}
