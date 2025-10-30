<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warga extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id'; // sesuai tabel
    protected $fillable = [
        'nik',
        'nama_warga',
        'no_hp',
        'jenis_kelamin',
        'tanggal_lahir',
        'pekerjaan'
    ];
}
