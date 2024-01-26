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
        Schema::create('summary_area_month', function (Blueprint $table) {
            $table->id();
            $table->integer('area_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('potensi');
            $table->integer('tunai');
            $table->integer('jml_trx');
            $table->integer('non_tunai');
            $table->integer('total');
            $table->integer('kurang_setor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_area_month');
    }
};
