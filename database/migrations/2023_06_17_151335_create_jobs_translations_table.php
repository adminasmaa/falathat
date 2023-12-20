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
        Schema::create('jobs_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('translation_id');
            $table->unsignedBigInteger('job_id');
            $table->string('title')->nullable();
            $table->longText('brief')->nullable();
            $table->longText('tags')->nullable();
            $table->timestamps();

            $table->foreign('translation_id')->on('languages')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('job_id')->on('jobs')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs_translations');
    }
};
