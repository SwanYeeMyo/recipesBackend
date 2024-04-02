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
        Schema::create('recipes', function (Blueprint $table) {

            $table->id();
            $table->string('title');
            $table->longText('author_note')->nullable();
            $table->longText('kitchen_note')->nullable();
            $table->integer('cook_time');
            $table->integer('prep_time');
            $table->integer('serving');
            $table->string('type')->default('free');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};