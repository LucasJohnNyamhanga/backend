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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bodypart_id');
            $table->string('equipment')->nullable();;
            $table->string('gifUrl')->nullable();;
            $table->string('name');
            //$table->string('target');
            $table->timestamps();
            $table->foreign('bodypart_id')->references('id')->on('bodyparts')->onDelete('cascade');
            

        });
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercises');
    }
};
