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
        Schema::create('languages_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('translation_id');
            $table->unsignedBigInteger('language_id');
            $table->string('name')->nullable();
            $table->timestamps();

            $table->foreign('translation_id')->on('languages')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('language_id')->on('languages')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages_translations');
    }
};
