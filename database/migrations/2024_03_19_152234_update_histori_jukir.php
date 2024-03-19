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
        Schema::table('histori_jukir', function(Blueprint $table){
            $table->integer('jml_hari_libur')->nullable();
            $table->integer('tahun_libur')->nullable();
            $table->date('tgl_awal_libur')->nullable();
            $table->date('tgl_akhir_libur')->nullable();
            $table->integer('potensi_harian')->nullable();
            $table->integer('kompensasi')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('histori_jukir', function($table) {
            $table->dropColumn('jml_hari_libur');
            $table->dropColumn('tahun_libur');
            $table->dropColumn('hari_awal_libur');
            $table->dropColumn('hari_akhir_libur');
            $table->dropColumn('potensi_harian');
            $table->dropColumn('kompensasi');
        });
    }
};
