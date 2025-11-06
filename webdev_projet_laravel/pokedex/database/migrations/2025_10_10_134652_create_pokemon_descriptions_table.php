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
        if(!Schema::hasTable('pokemon_descriptions')){
            Schema::create('pokemon_descriptions', function (Blueprint $table) {
                $table->unsignedBigInteger('pokemon_id')->primary();
                $table->float('size');
                $table->float('weight')->nullable();
                $table->tinyInteger('sex')->default(2); // 0 -> mâle, 1 -> femelle, 2 -> les deux
                $table->text('description')->nullable();

                $table->foreign('pokemon_id')
                    ->references('id')
                    ->on('pokemon')
                    ->cascadeOnDelete();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_descriptions');
    }
};
