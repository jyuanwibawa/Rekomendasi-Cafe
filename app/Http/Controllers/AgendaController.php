<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;

class AgendaController extends Controller
{
    // Menampilkan semua kategori agenda
    public function index()
    {
        $agendas = Agenda::all();
        return view('admin.agenda.index', compact('agendas'));
    }

    // Menampilkan form untuk menambahkan kategori agenda
    public function create()
    {
        return view('admin.agenda.create');
    }

    // Menyimpan kategori agenda yang baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori_agenda' => 'required|string|max:255',
            'foto_agenda' => 'required|image|max:2048',
        ]);

        // Simpan foto agenda ke storage
        if ($request->hasFile('foto_agenda')) {
            $validated['foto_agenda'] = $request->file('foto_agenda')->store('agendas', 'public');
        }

        // Menyimpan kategori agenda ke database
        Agenda::create($validated);

        return redirect()->route('admin.agendas.index')->with('success', 'Kategori Agenda berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit kategori agenda
    public function edit($id)
    {
        $agenda = Agenda::findOrFail($id);
        return view('admin.agenda.edit', compact('agenda'));
    }

    // Memperbarui kategori agenda yang sudah ada
    public function update(Request $request, $id)
    {
        $agenda = Agenda::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori_agenda' => 'required|string|max:255',
            'foto_agenda' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_agenda')) {
            // Hapus foto lama jika ada
            if ($agenda->foto_agenda) {
                \Storage::disk('public')->delete($agenda->foto_agenda);
            }

            $validated['foto_agenda'] = $request->file('foto_agenda')->store('agendas', 'public');
        }

        $agenda->update($validated);

        return redirect()->route('admin.agendas.index')->with('success', 'Kategori Agenda berhasil diperbarui');
    }

    // Menghapus kategori agenda
    public function destroy($id)
    {
        $agenda = Agenda::findOrFail($id);

        // Hapus foto jika ada
        if ($agenda->foto_agenda) {
            \Storage::disk('public')->delete($agenda->foto_agenda);
        }

        $agenda->delete();

        return redirect()->route('admin.agendas.index')->with('success', 'Kategori Agenda berhasil dihapus');
    }
}
