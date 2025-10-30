<?php

namespace App\Http\Controllers;

use App\Models\Proyek;
use Illuminate\Http\Request;

class ProyekController extends Controller
{
    // Menampilkan semua data proyek
    public function index()
    {
        $proyek = Proyek::all();
        return view('proyek.index', compact('proyek'));
    }

    // Menampilkan form tambah data proyek
    public function create()
    {
        return view('proyek.create');
    }

    // Menyimpan data proyek baru
    public function store(Request $request)
    {
        $request->validate([
            'kode_proyek' => 'required|unique:proyeks,kode_proyek',
            'nama_proyek' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'anggaran' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        Proyek::create($request->all());

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil ditambahkan.');
    }

    // Menampilkan form edit data proyek
    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('proyek.edit', compact('proyek'));
    }

    // Mengupdate data proyek
    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);

        $request->validate([
            'kode_proyek' => 'required|unique:proyeks,kode_proyek,' . $proyek->proyek_id . ',proyek_id',
            'nama_proyek' => 'required|string|max:255',
            'tahun' => 'required|integer',
            'lokasi' => 'required|string|max:255',
            'anggaran' => 'required|numeric',
            'sumber_dana' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $proyek->update($request->all());

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil diupdate.');
    }

    // Menghapus data proyek
    public function destroy($id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->delete();

        return redirect()->route('proyek.index')->with('success', 'Data proyek berhasil dihapus.');
    }
}
