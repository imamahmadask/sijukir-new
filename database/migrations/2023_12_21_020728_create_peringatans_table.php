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
        Schema::create('surat_peringatans', function (Blueprint $table) {
            $table->id();
            $table->string('tipe', 50);
            $table->date('tgl_klarifikasi');
            $table->json('riwayat');
            $table->integer('kompensasi')->nullable();
            $table->string('jml_kurang_setor', 20);
            $table->string('total_bayar', 20)->nullable();
            $table->date('batas_setor');
            $table->string('cara_bayar', 50);
            $table->integer('banyak_cicilan')->nullable();
            $table->json('cicilan')->nullable();
            $table->text('ket')->nullable();
            $table->string('no_surat', 50);
            $table->integer('is_lunas')->default(0);
            $table->integer('jukir_id');
            $table->string('created_by', 50)->nullable();
            $table->string('edited_by', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_peringatans');
    }
};
