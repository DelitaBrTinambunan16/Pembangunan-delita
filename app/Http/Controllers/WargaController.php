<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    public function index()
    {
        $wargas = Warga::all();
        return view('warga.index', compact('wargas'));
    }

    public function create()
    {
        return view('warga.create');
    }

    public function store(Request $request)
    {
       $data ['nik'] = $request->nik;
         $data ['nama'] = $request->nama;
         $data['alamat'] = $request->alamat;
         $data['no_hp'] = $request->no_hp;
         $data['jenis_kelamin'] = $request->jenis_kelamin;
         $data['pekerjaan'] = $request->pekerjaan;
         $data['tanggal_lahir'] = $request->tanggal_lahir;
         $data['email'] = $request->email;

        Warga::create($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('warga.edit', compact('warga'));
    }

    public function update(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);

        $request->validate([
            'nik' => 'required|unique:wargas,nik,' . $id,
            'nama' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus.');
    }
}

