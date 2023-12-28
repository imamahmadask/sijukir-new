<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('telepon', 15);
            $table->text('pesan');
            $table->string('titik', 50);
            $table->string('lokasi', 50);
            $table->string('jenis', 50);
            $table->string('foto')->nullable();
            $table->string('status', 50)->default('Belum Diproses');
            $table->string('saran')->nullable();
            $table->date('tgl_diproses')->nullable();
            $table->date('tgl_selesai_proses')->nullable();
            $table->string('edited_by', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengaduan');
    }
};
