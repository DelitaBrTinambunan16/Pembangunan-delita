<?php

namespace App\Http\Controllers;

use App\Models\TahapanProyek;
use App\Models\Proyek;
use Illuminate\Http\Request;

class TahapanProyekController extends Controller
{
public function index()
{
    $tahapans = TahapanProyek::with('proyek')->get();
    return view('tahapan.index', compact('tahapans'));
}


    public function create()
    {
        $proyeks = Proyek::all();
        return view('tahapan.create', compact('proyeks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'proyek_id' => 'required',
            'nama_tahapan' => 'required',
            'tanggal_mulai' => 'required|date',
            'status' => 'required',
        ]);

        TahapanProyek::create($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $tahapan = TahapanProyek::findOrFail($id);
        $proyeks = Proyek::all();
        return view('tahapan.edit', compact('tahapan', 'proyeks'));
    }

    public function update(Request $request, $id)
    {
        $tahapan = TahapanProyek::findOrFail($id);

        $request->validate([
            'proyek_id' => 'required',
            'nama_tahapan' => 'required',
            'tanggal_mulai' => 'required|date',
            'status' => 'required',
        ]);

        $tahapan->update($request->all());

        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $tahapan = TahapanProyek::findOrFail($id);
        $tahapan->delete();

        return redirect()->route('tahapan.index')->with('success', 'Data tahapan berhasil dihapus.');
    }
}
