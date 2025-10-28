<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warga;

class WargaSeeder extends Seeder
{
    public function run()
    {
        Warga::create([
            'nik' => '1234567890123456',
            'nama_warga' => 'Budi Santoso',
            'alamat' => 'Jl. Merpati No. 12',
            'no_hp' => '081234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tanggal_lahir' => '1990-04-10',
            'pekerjaan' => 'Karyawan Swasta'
        ]);
    }
}
$this->call([
    UserSeeder::class,
    WargaSeeder::class,
]);
