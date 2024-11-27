<?php

namespace App\Http\Controllers;

use App\Models\Cafe;
use App\Models\Mood;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CafeController extends Controller
{
    public function index()
    {
        // Mengambil semua data cafe dengan relasi
        $cafes = Cafe::with(['mood', 'agenda'])->get();
        return view('admin.cafe.index', compact('cafes'));
    }

    public function create()
    {
        // Mengambil data mood dan agenda untuk form tambah cafe
        $moods = Mood::all();
        $agendas = Agenda::all();
        return view('admin.cafe.create', compact('moods', 'agendas'));
    }


    public function edit(Cafe $cafe)
    {
        $moods = Mood::all();
        $agendas = Agenda::all();
        return view('admin.cafe.edit', compact('cafe', 'moods', 'agendas'));
    }


    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'nama_cafe' => 'required|string|max:255',
            'foto_cafe' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'alamat' => 'required|string|max:255',
            'range_harga' => 'required|string|max:100',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kecepatan_wifi' => 'required|numeric',
            'kategori_cafe' => 'required|string|in:mood,agenda',
            'nama_kategori' => 'nullable|string',
        ]);

        // Menangani input kategori dan menyimpan ID mood atau agenda
        $id_mood = null;
        $id_agenda = null;

        if ($request->kategori_cafe === 'mood') {
            $mood = Mood::where('nama_kategori_mood', $request->nama_kategori)->first();
            $id_mood = $mood ? $mood->id_mood : null;
        } elseif ($request->kategori_cafe === 'agenda') {
            $agenda = Agenda::where('nama_kategori_agenda', $request->nama_kategori)->first();
            $id_agenda = $agenda ? $agenda->id_agenda : null;
        }

        // Menyimpan cafe
        $cafe = new Cafe();
        $cafe->nama_cafe = $request->nama_cafe;
        $cafe->foto_cafe = $request->file('foto_cafe') ? $request->file('foto_cafe')->store('cafes', 'public') : null;
        $cafe->alamat = $request->alamat;
        $cafe->range_harga = $request->range_harga;
        $cafe->jam_buka = $request->jam_buka;
        $cafe->jam_tutup = $request->jam_tutup;
        $cafe->kecepatan_wifi = $request->kecepatan_wifi;
        $cafe->kategori_cafe = $request->kategori_cafe;
        $cafe->nama_kategori = $request->nama_kategori;
        $cafe->id_mood = $id_mood;
        $cafe->id_agenda = $id_agenda;
        $cafe->save();

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil ditambahkan!');
    }

    public function update(Request $request, Cafe $cafe)
    {
        $validated = $request->validate([
            'nama_cafe' => 'required|string|max:255',
            'foto_cafe' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'alamat' => 'required|string',
            'range_harga' => 'required|string',
            'jam_buka' => 'required',
            'jam_tutup' => 'required',
            'kecepatan_wifi' => 'required|integer',
            'nama_kategori' => 'nullable|string',
        ]);

        // Menentukan id_mood atau id_agenda
        $id_kategori = null;
        if ($request->kategori_cafe === 'mood') {
            $id_kategori = Mood::where('nama_kategori_mood', $request->nama_kategori)->first()->id_mood ?? null;
        } elseif ($request->kategori_cafe === 'agenda') {
            $id_kategori = Agenda::where('nama_kategori_agenda', $request->nama_kategori)->first()->id_agenda ?? null;
        }

        // Update foto jika ada
        $validated['foto_cafe'] = $this->updateImage($request, 'foto_cafe', 'cafe', $cafe->foto_cafe);

        // Update data cafe
        $cafe->update($validated);

        // Update kategori
        $cafe->id_mood = $request->kategori_cafe === 'mood' ? $id_kategori : null;
        $cafe->id_agenda = $request->kategori_cafe === 'agenda' ? $id_kategori : null;
        $cafe->save();

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil diperbarui.');
    }

    public function destroy(Cafe $cafe)
    {
        // Hapus foto jika ada
        $this->deleteImage($cafe->foto_cafe);

        // Hapus data cafe
        $cafe->delete();

        return redirect()->route('admin.cafes.index')->with('success', 'Cafe berhasil dihapus.');
    }

    /**
     * Simpan gambar ke storage.
     */
    private function storeImage(Request $request, $fieldName, $folder)
    {
        return $request->file($fieldName) ? $request->file($fieldName)->store($folder, 'public') : null;
    }

    /**
     * Update gambar di storage.
     */
    private function updateImage(Request $request, $fieldName, $folder, $oldPath = null)
    {
        if ($request->file($fieldName)) {
            $this->deleteImage($oldPath);
            return $this->storeImage($request, $fieldName, $folder);
        }
        return $oldPath;
    }

    /**
     * Hapus gambar dari storage.
     */
    private function deleteImage($path)
    {
        if ($path) {
            Storage::disk('public')->delete($path);
        }
    }

    public function showMoodCafe()
    {
        // Ambil kafe dengan kategori 'mood'
        $cafes = Cafe::where('kategori_cafe', 'mood')->get();

        // Kirim data ke view 'mood.blade.php'
        return view('mood', compact('cafes'));
    }

    public function showActivityCafe()
    {
        // Ambil kafe dengan kategori 'agenda' (atau aktivitas)
        $cafes = Cafe::where('kategori_cafe', 'agenda')->get();
    
        // Kirim data ke view yang sesuai
        return view('agenda', compact('cafes'));
    }
    
}
