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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->string('titik_parkir', 100);
            $table->string('lokasi_parkir', 100);
            $table->string('slug', 100);
            $table->string('jenis_lokasi', 50);
            $table->string('waktu_pelayanan', 50);
            $table->string('dasar_ketetapan', 50);
            $table->string('no_ketetapan', 50);
            $table->date('tgl_ketetapan');
            $table->text('google_maps');
            $table->string('kord_lat', 50);
            $table->string('kord_long', 50);
            $table->string('status', 50);
            $table->date('tgl_registrasi');
            $table->string('pendaftaran', 50);
            $table->string('sisi', 50);
            $table->string('panjang_luas', 25);
            $table->string('hari_buka', 25);
            $table->string('kategori', 100);
            $table->string('keterangan', 100)->nullable();
            $table->string('gambar', 100);
            $table->integer('is_jukir');
            $table->integer('kelurahan_id');
            $table->integer('area_id');
            $table->integer('korlap_id');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
