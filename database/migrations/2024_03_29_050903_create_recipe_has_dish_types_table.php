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
        Schema::create('dish_type_recipe', function (Blueprint $table) {

            $table->unsignedBigInteger('dish_type_id');
            $table->unsignedBigInteger('recipe_id');

            // Define foreign key constraints
            $table->foreign('dish_type_id')->references('id')->on('dish_types')->onDelete('cascade');
            $table->foreign('recipe_id')->references('id')->on('recipes')->onDelete('cascade');

            // Define primary key (composite key)
            $table->primary(['dish_type_id', 'recipe_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dish_type_recipe');
    }
};
