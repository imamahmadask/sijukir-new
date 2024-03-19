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
        Schema::create('merchant_histori', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jukir_id');
            $table->bigInteger('old_merchant_id');
            $table->bigInteger('new_merchant_id');
            $table->timestamp('tanggal_perubahan');
            $table->timestamps();

            $table->foreign('jukir_id')->references('id')->on('jukirs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('merchant_histori');
    }
};
