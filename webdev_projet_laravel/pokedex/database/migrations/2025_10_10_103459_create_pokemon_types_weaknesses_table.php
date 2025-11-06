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
        if(!Schema::hasTable('pokemon_types_weaknesses')){
            Schema::create('pokemon_types_weaknesses', function (Blueprint $table) {
                $table->foreignId('pokemon_id')->constrained('pokemon')->cascadeOnDelete();
                $table->foreignId('type_id')->constrained('types')->cascadeOnDelete();
                $table->boolean('is_weakness')->default(false);

                $table->primary(['pokemon_id', 'type_id', 'is_weakness']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pokemon_types_weaknesses');
    }
};
