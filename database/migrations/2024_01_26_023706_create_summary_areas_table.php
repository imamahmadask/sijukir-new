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
        Schema::create('summary_by_area', function (Blueprint $table) {
            $table->id();
            $table->string('area', 25);
            $table->integer('tahun');
            $table->bigInteger('potensi');
            $table->bigInteger('tunai');
            $table->integer('jml_trx');
            $table->bigInteger('non_tunai');
            $table->bigInteger('total');
            $table->integer('area_id');
            $table->integer('jukirs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_by_area');
    }
};
