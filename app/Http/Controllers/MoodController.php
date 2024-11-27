<?php

namespace App\Http\Controllers;

use App\Models\Mood;
use Illuminate\Http\Request;

class MoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $moods = Mood::all();
        return view('admin.mood.index', compact('moods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.mood.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori_mood' => 'required|string|max:255',
            'foto_mood' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_mood')) {
            $validated['foto_mood'] = $request->file('foto_mood')->store('moods', 'public');
        }

        Mood::create($validated);

        return redirect()->route('admin.moods.index')->with('success', 'Mood berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $mood = Mood::findOrFail($id);
        return view('admin.mood.show', compact('mood'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $mood = Mood::findOrFail($id);
        return view('admin.mood.edit', compact('mood'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $mood = Mood::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori_mood' => 'required|string|max:255',
            'foto_mood' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('foto_mood')) {
            $validated['foto_mood'] = $request->file('foto_mood')->store('moods', 'public');
        }

        $mood->update($validated);

        return redirect()->route('admin.moods.index')->with('success', 'Mood berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mood = Mood::findOrFail($id);

        if ($mood->foto_mood) {
            \Storage::disk('public')->delete($mood->foto_mood);
        }

        $mood->delete();

        return redirect()->route('admin.moods.index')->with('success', 'Mood berhasil dihapus.');
    }
}
