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
        Schema::create('target', function (Blueprint $table) {
            $table->id();
            $table->integer('tahun');
            $table->bigInteger('target');
            $table->bigInteger('pencapaian');
            $table->bigInteger('selisih');
            $table->double('persentase');
            $table->bigInteger('penangguhan_sebelum')->nullable();
            $table->bigInteger('penangguhan_sesudah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target');
    }
};
