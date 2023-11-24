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
        Schema::create('trans_non_tunai', function (Blueprint $table) {
            $table->id();
            $table->datetime('tgl_transaksi')->index();
            $table->integer('bulan')->nullable();
            $table->integer('tahun')->nullable();
            $table->string('merchant_name', 25);
            $table->string('issuer_name', 50);
            $table->string('syslog')->unique();
            $table->bigInteger('total_nilai');
            $table->string('status', 25);
            $table->string('filename', 50);
            $table->string('info', 10);
            $table->string('settlement', 25)->nullable();
            $table->bigInteger('merchant_id')->index();
            $table->integer('area_id')->index();
            $table->string('kecamatan', 25)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trans_non_tunai');
    }
};
