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
        Schema::create('summary_lomba_korlap', function (Blueprint $table) {
            $table->id();
            $table->integer('korlap_id');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->integer('kategori_1');
            $table->integer('kategori_2');
            $table->integer('kategori_3');
            $table->integer('total_jukir');
            $table->integer('potensi_tap');
            $table->integer('target_tap');
            $table->integer('perolehan_tap');
            $table->integer('perolehan_nominal');
            $table->double('persentase');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_lomba_korlap');
    }
};
