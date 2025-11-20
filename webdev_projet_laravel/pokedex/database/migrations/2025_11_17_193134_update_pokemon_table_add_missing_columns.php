<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::table('pokemon', function (Blueprint $table) {
                // 1. Renomme HP → hp (minuscule)
                $table->renameColumn('HP', 'hp');

                // 2. Ajoute les colonnes manquantes
                $table->decimal('size', 4, 2)->after('speed');        // ex: 1.70 m
                $table->decimal('weight', 6, 2)->after('size');       // ex: 999.99 kg
                $table->tinyInteger('sex')->default(2)->after('weight'); // 0 = mâle, 1 = femelle, 2 = asexué
                $table->text('description')->nullable()->after('sex');  // ou pas nullable si tu veux required
            });
        }

        public function down(): void {
            Schema::table('pokemon', function (Blueprint $table) {
                $table->renameColumn('hp', 'HP');
                $table->dropColumn(['size', 'weight', 'sex', 'description']);
            });
        }
    };
