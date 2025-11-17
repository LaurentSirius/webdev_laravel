<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        // 2025_10_10_134652_create_pokemon_descriptions_table.php

        public function up(): void {
            Schema::create('pokemon_descriptions', function (Blueprint $table) {
                $table->id(); // ← AJOUTE ÇA
                $table->foreignId('pokemon_id')->unique()->constrained()->cascadeOnDelete();
                $table->float('size');
                $table->float('weight')->nullable();
                $table->tinyInteger('sex')->default(2);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void {
            Schema::dropIfExists('pokemon_descriptions');
        }
    };
