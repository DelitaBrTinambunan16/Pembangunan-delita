<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProyekController extends Controller
{
    public function index()
    {
        $proyeks = Proyek::latest()->get();
        return view('proyek.index', compact('proyeks'));
    }

    public function create()
    {
        return view('proyek.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_proyek' => 'required',
            'tanggal_mulai' => 'required|date',
            'status' => 'required',
            'dokumen' => 'nullable|mimes:pdf,docx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            $data['dokumen'] = $request->file('dokumen')->store('dokumen_proyek', 'public');
        }

        Proyek::create($data);

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $request->validate([
            'nama_proyek' => 'required',
            'tanggal_mulai' => 'required|date',
            'status' => 'required',
            'dokumen' => 'nullable|mimes:pdf,docx|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('dokumen')) {
            if ($proyek->dokumen && Storage::disk('public')->exists($proyek->dokumen)) {
                Storage::disk('public')->delete($proyek->dokumen);
            }
            $data['dokumen'] = $request->file('dokumen')->store('dokumen_proyek', 'public');
        }

        $proyek->update($data);

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        if ($proyek->dokumen && Storage::disk('public')->exists($proyek->dokumen)) {
            Storage::disk('public')->delete($proyek->dokumen);
        }
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil dihapus.');
    }
}
