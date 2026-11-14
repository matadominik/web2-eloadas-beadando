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
        Schema::create('jegy', function (Blueprint $table) {
            $table->id();
            $table->foreignId('diakid')->constrained('diak'); 
            $table->date('datum'); 
            $table->integer('ertek'); 
            $table->string('tipus'); 
            $table->foreignId('targyid')->constrained('targy'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jegy');
    }
};
