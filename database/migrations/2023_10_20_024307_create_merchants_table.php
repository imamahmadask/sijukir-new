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
        Schema::create('merchant', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_terdaftar');
            $table->string('nmid', 50);
            $table->string('merchant_name', 100);
            $table->string('vendor', 25);
            $table->string('no_rekening', 50);
            $table->string('qris');
            $table->integer('area_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchants');
    }
};
