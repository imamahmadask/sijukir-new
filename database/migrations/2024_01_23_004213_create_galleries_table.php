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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('kode', 7);
            $table->string('judul', 150);
            $table->string('slug', 150);
            $table->text('deskripsi');
            $table->string('kategori', 50);
            $table->date('tanggal');
            $table->string('gambar')->nullable();
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
        Schema::dropIfExists('galleries');
    }
};
