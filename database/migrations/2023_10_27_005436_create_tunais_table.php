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
        Schema::create('trans_tunai', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_transaksi');
            $table->string('no_kwitansi', 50);
            $table->string('type', 50);
            $table->bigInteger('jumlah_transaksi');
            $table->integer('selisih')->default(0);
            $table->text('keterangan')->nullable();
            $table->integer('jukir_id');
            $table->integer('area_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_tunai');
    }
};
