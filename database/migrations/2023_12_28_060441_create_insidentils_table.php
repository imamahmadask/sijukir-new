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
        Schema::create('insidentil', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pendaftaran');
            $table->string('nik', 25);
            $table->string('nama', 50);
            $table->string('alamat');
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('jk', 15);
            $table->string('agama', 15);
            $table->string('pekerjaan', 25);
            $table->string('telepon', 15);
            $table->string('jenis_izin', 50);
            $table->string('nama_perusahaan', 50);
            $table->string('alamat_perusahaan');
            $table->string('akta_perusahaan', 50);
            $table->string('npwp_perusahaan', 50);
            $table->string('nama_acara', 50);
            $table->string('lokasi_acara', 50);
            $table->integer('jumlah_hari');
            $table->date('tgl_awal_acara');
            $table->date('tgl_akhir_acara');
            $table->string('waktu_acara', 25);
            $table->string('lokasi_parkir', 50);
            $table->string('kriteria_lokasi', 50);
            $table->integer('luas_lokasi');
            $table->integer('r2');
            $table->integer('r4');
            $table->integer('potensi');
            $table->integer('setoran');
            $table->string('dokumen')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('status', 25)->default('Pending');
            $table->bigInteger('merchant_id');
            $table->date('tgl_surat')->nullable();
            $table->string('no_surat', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insidentils');
    }
};
