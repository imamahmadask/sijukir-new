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
        Schema::create('histori_peringatans', function (Blueprint $table) {
            $table->id();
            $table->integer('surat_peringatan_id');
            $table->date('tanggal');
            $table->integer('jml_setor');
            $table->string('deskripsi');
            $table->string('keterangan');
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
        Schema::dropIfExists('histori_peringatans');
    }
};
