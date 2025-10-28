<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga'; // optional, kalau nama tabel sesuai pluralisasi Laravel, bisa dihapus

    // Tentukan primary key khusus
    protected $primaryKey = 'warga_id';

    // Jika primary key auto-increment (default integer), ini bisa tetap true
    public $incrementing = true;

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'nama',
        'no_ktp',
        'jenis_kelamin',
        'agama',
        'pekerjaan',
        'telepon',
        'email',
    ];
}
