<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up() {
            Schema::table('pokemon', function (Blueprint $table) {
                $table->renameColumn('HP', 'hp');
            });
        }

        public function down() {
            Schema::table('pokemon', function (Blueprint $table) {
                $table->renameColumn('hp', 'HP');
            });
        }
    };
