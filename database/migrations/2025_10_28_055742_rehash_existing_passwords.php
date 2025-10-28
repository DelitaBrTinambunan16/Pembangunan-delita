<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RehashExistingPasswords extends Migration
{
    public function up()
    {
        // Ambil semua user
        $users = User::all();

        foreach ($users as $user) {
            // Jika password sudah Bcrypt, lewati
            if (!Hash::needsRehash($user->password)) {
                continue;
            }

            // Rehash password (jika teks biasa atau hash lama)
            $user->password = Hash::make($user->password);
            $user->save();
        }
    }

    public function down()
    {
        // Tidak perlu rollback, karena ini hanya update hash
    }
}
