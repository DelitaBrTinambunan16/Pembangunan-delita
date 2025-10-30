<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;

    // Jika nama tabel bukan plural "proyeks", bisa ditentukan explicit
    protected $table = 'proyeks';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'kode_proyek',
        'nama_proyek',
        'tahun',
        'lokasi',
        'anggaran',
        'sumber_dana',
        'deskripsi',
    ];

    // Jika primary key bukan 'id'
    protected $primaryKey = 'proyek_id';
}
