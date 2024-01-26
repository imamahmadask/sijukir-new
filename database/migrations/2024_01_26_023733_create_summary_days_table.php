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
        Schema::create('summary_day', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jml_transaksi');
            $table->integer('jml_jukir');
            $table->bigInteger('total');
            $table->integer('average_trx');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_day');
    }
};
