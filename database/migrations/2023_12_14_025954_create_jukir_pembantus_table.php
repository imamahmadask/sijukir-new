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
        Schema::create('jukir_pembantu', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nik', 25);
            $table->string('alamat', 100);
            $table->string('kel_alamat', 50);
            $table->string('kec_alamat', 50);
            $table->string('kab_kota_alamat', 50);
            $table->string('telepon', 15);
            $table->string('tempat_lahir', 25);
            $table->date('tgl_lahir');
            $table->string('jenis_kelamin', 25);
            $table->string('agama', 15);
            $table->string('foto');
            $table->boolean('status');
            $table->integer('jukir_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jukir_pembantu');
    }
};
