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
        Schema::create('korlaps', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->string('nik', 25);
            $table->string('alamat', 100);
            $table->string('telepon', 15);
            $table->string('foto');
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
        Schema::dropIfExists('korlaps');
    }
};
