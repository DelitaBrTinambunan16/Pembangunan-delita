<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang boleh diisi secara massal.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Kolom yang disembunyikan ketika serialisasi (misal JSON).
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Tipe data kolom.
     */
    protected $casts = [
        'password' => 'hashed',
    ];
}
