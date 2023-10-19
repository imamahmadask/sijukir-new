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
        Schema::create('jukirs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_jukir', 15);
            $table->string('nik_jukir', 30);
            $table->string('nama_jukir', 50);
            $table->string('tempat_lahir', 25);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 20);
            $table->string('alamat', 100);
            $table->string('kel_alamat', 25);
            $table->string('kec_alamat', 25);
            $table->string('kab_kota_alamat', 25);
            $table->string('telepon', 15);
            $table->string('agama', 15);
            $table->string('jenis_jukir', 20);
            $table->string('no_perjanjian', 20);
            $table->date('tgl_perjanjian');
            $table->date('tgl_akhir_perjanjian');
            $table->date('tgl_terbit_qr')->nullable();
            $table->string('status', 20);
            $table->integer('potensi_harian');
            $table->integer('potensi_bulanan');
            $table->date('tgl_pkh_upl')->nullable();
            $table->integer('uji_petik')->nullable();
            $table->integer('potensi_bulanan_upl')->nullable();
            $table->string('waktu_kerja', 50);
            $table->integer('jml_hari_kerja');
            $table->integer('hari_kerja_bulan');
            $table->string('hari_libur', 50)->nullable();
            $table->string('foto');
            $table->string('document');
            $table->string('ket_jukir', 25);
            $table->integer('area_id');
            $table->integer('lokasi_id');
            $table->bigInteger('merchant_id');
            $table->date('tgl_nonactive')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jukirs');
    }
};
