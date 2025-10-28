<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tahapan_proyeks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proyek_id')->constrained('proyeks')->onDelete('cascade');
            $table->string('nama_tahapan');
            $table->text('keterangan')->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();
            $table->enum('status', ['Belum Dimulai', 'Berjalan', 'Selesai'])->default('Belum Dimulai');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tahapan_proyeks');
    }
};
