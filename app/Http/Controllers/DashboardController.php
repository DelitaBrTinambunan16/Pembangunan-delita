<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Warga;
use App\Models\Proyek;
use App\Models\TahapanProyek;

class DashboardController extends Controller
{
    public function index()
    {
        // Total proyek
        $totalProyek = Proyek::count();

        // Total tahapan proyek
        $totalTahapan = TahapanProyek::count();

        // Total warga
        $totalWarga = Warga::count();

        // Proyek aktif (jika ada kolom status, misal 'aktif')
        // Kalau tidak ada kolom status, bisa ditampilkan semua proyek saja
        // $proyekAktif = Proyek::where('status', 'aktif')->count();

        // Anggaran total proyek (optional)
        $totalAnggaran = Proyek::sum('anggaran');

        return view('dashboard.index', compact(
            'totalProyek',
            'totalTahapan',
            'totalWarga',
            // 'proyekAktif',
            'totalAnggaran'
        ));
    }
}
