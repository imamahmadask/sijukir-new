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
        Schema::create('summary_jukir_month', function (Blueprint $table) {
            $table->id();
            $table->integer('jukir_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('potensi');
            $table->integer('jml_trx');
            $table->bigInteger('tunai')->default(0);
            $table->bigInteger('non_tunai')->default(0);
            $table->bigInteger('total')->default(0);
            $table->bigInteger('kurang_setor')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_jukir_month');
    }
};
