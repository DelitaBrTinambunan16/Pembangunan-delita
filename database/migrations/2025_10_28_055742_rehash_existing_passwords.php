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

        foreach ($Users as $User) {
            // Jika password sudah Bcrypt, lewati
            if (!Hash::needsRehash($User->password)) {
                continue;
            }

            // Rehash password (jika teks biasa atau hash lama)
            $User->password = Hash::make($User->password);
            $User->save();
        }
    }

    public function down()
    {
        // Tidak perlu rollback, karena ini hanya update hash
    }
}
