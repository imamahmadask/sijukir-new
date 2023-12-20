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
        Schema::create('histori_jukir', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_histori');
            $table->string('no_surat', 50);
            $table->string('jenis_histori', 50);
            $table->string('histori');
            $table->string('created_by', 50);
            $table->string('edited_by', 50);
            $table->integer('jukir_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histori_jukir');
    }
};
