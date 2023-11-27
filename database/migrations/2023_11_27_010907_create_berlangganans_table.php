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
        Schema::create('parkir_berlangganans', function (Blueprint $table) {
            $table->id();
            $table->string('nomor', 50);
            $table->string('jenis', 25);
            $table->string('nama', 100);
            $table->string('no_pol', 11);
            $table->string('alamat', 50);
            $table->string('status', 50);
            $table->bigInteger('jumlah');
            $table->string('masa_berlaku', 10);
            $table->date('awal_berlaku');
            $table->date('akhir_berlaku');
            $table->date('tgl_dikeluarkan');
            $table->string('keterangan', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berlangganans');
    }
};
