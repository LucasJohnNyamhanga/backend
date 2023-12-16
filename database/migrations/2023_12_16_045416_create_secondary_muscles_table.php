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
        Schema::create('secondaryMuscle', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exerciseId');
            $table->string('name');
            $table->timestamps();
            $table->foreign('exerciseId')->references('id')->on('exercises')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secondaryMuscle');
    }
};