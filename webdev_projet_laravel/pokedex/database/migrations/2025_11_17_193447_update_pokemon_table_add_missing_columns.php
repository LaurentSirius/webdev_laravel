<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::table('pokemon', function (Blueprint $table) {
                // 1. Renomme HP → hp (minuscule)
                if (Schema::hasColumn('pokemon', 'HP')) {
                    $table->renameColumn('HP', 'hp');
                }

                // 2. Ajoute les colonnes manquantes (si elles n’existent pas déjà)
                if (!Schema::hasColumn('pokemon', 'size')) {
                    $table->decimal('size', 5, 2)->nullable()->after('speed');     // ex: 1.75
                }
                if (!Schema::hasColumn('pokemon', 'weight')) {
                    $table->decimal('weight', 6, 2)->nullable()->after('size');    // ex: 999.99
                }
                if (!Schema::hasColumn('pokemon', 'sex')) {
                    $table->tinyInteger('sex')->default(2)->after('weight');        // 0=mâle, 1=femelle, 2=asexué
                }
                if (!Schema::hasColumn('pokemon', 'description')) {
                    $table->text('description')->nullable()->after('sex');
                }

                // Rend hp nullable temporairement si besoin (au cas où il y ait des anciens pokémons)
                $table->integer('hp')->nullable()->change();
            });
        }

        public function down(): void {
            Schema::table('pokemon', function (Blueprint $table) {
                $table->renameColumn('hp', 'HP');
                $table->dropColumn(['size', 'weight', 'sex', 'description']);
            });
        }
    };
