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
        Schema::table('jukirs', function(Blueprint $table){
            $table->bigInteger('old_merchant_id')->nullable();
            $table->boolean('is_migration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jukirs', function($table) {
            $table->dropColumn('old_merchant_id');
            $table->dropColumn('is_migration');
        });
    }
};
