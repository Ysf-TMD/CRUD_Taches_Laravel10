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
        Schema::create('bieres', function (Blueprint $table) {
            $table->id();
            $table->string('alcool');
            $table->string('brasserie');
            $table->string('description');
            $table->string('fermentation');
            $table->string('user_id');
            $table->string('image');
            $table->string('nom');
            $table->string('pays');
            $table->string('ref');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bieres');
    }
};
