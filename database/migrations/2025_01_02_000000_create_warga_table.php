<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id('warga_id'); // PK
            $table->string('nik', 20)->unique();
            $table->string('nama_warga', 100);
            $table->string('alamat', 255);
            $table->string('no_hp', 20)->nullable();
            $table->string('jenis_kelamin', 10); // Laki-laki / Perempuan
            $table->date('tanggal_lahir')->nullable();
            $table->string('pekerjaan', 100)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warga');
    }
};
