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
        Schema::create('summary_by_month', function (Blueprint $table) {
            $table->id();
            $table->string('bulan', 50);
            $table->integer('tahun');
            $table->bigInteger('tunai')->default(0);
            $table->bigInteger('berlangganan')->default(0);
            $table->integer('jml_trx')->default(0);
            $table->bigInteger('non_tunai')->default(0);
            $table->integer('insidentil')->default(0);
            $table->bigInteger('total')->default(0);
            $table->date('max_createdAt')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('summary_by_month');
    }
};
