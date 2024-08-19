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
        Schema::create('formulas', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamps();
        });

        Schema::create('formula_ingredients', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formula_id')->nullable();
            $table->string('raw')->nullable();
            $table->string('code_name')->nullable();
            $table->timestamps();

            $table->foreign('formula_id')->references('id')->on('formulas')->onDelete('cascade');
        });

        Schema::create('formula_prints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('formula_id')->nullable();
            $table->string('grams')->nullable();
            $table->timestamps();

            $table->foreign('formula_id')->references('id')->on('formulas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formulas');
        Schema::dropIfExists('formula_ingredients');
        Schema::dropIfExists('formula_prints');
    }
};
