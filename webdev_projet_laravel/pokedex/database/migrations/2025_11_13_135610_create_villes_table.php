<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('villes', function (Blueprint $table) {
        $table->unsignedBigInteger('id')->primary();
        $table->string('name');
        $table->unsignedBigInteger('champion')->nullable();
        $table->timestamps();

        $table->foreign('champion')->references('id')->on('dresseurs')->onDelete('set null');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('villes');
    }
};
