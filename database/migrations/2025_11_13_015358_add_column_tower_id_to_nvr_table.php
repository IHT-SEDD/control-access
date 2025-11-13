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
        Schema::table('nvrs', function (Blueprint $table) {
            $table->unsignedBigInteger('tower_id')->after('id');
            $table->foreign('tower_id')->references('id')->on('towers')->onDelete('cascade');

            $table->index(['tower_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nvrs', function (Blueprint $table) {
            $table->dropForeign(['tower_id']);
            $table->dropIndex(['tower_id']);
            $table->dropColumn('tower_id');
        });
    }
};
