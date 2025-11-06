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
        if(!Schema::hasTable('pokemon')){
            Schema::create('pokemon', function (Blueprint $table) {
                $table->id();
                $table->integer('number');
                $table->string('name');
                $table->integer('HP');
                $table->integer('attack')->nullable();
                $table->integer('defense')->nullable();
                $table->integer('speed')->nullable();
                $table->unsignedBigInteger('evolve_from')->nullable();
                $table->unsignedBigInteger('evolve_to')->nullable();
                $table->integer('evolution_step')->default(1);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon');
    }
};
