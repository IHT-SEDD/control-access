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
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nvr_id');
            $table->foreign('nvr_id')->references('id')->on('nvrs')->onDelete('cascade');
            $table->string('code');
            $table->string('brand')->nullable();
            $table->string('type')->nullable();
            $table->string('name');
            $table->string('initial', 50)->nullable();
            $table->text('description')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('channel')->nullable();
            $table->tinyInteger('is_active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cameras');
    }
};
