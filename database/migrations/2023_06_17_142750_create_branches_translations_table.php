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
        Schema::create('branches_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('translation_id');
            $table->unsignedBigInteger('branch_id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->longText('achievements')->nullable();
            $table->longText('rates')->nullable();
            $table->string('main_phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->string('address')->nullable();
            $table->string('work_days')->nullable();
            $table->string('work_time')->nullable();
            $table->string('holiday')->nullable();
            $table->timestamps();

            $table->foreign('translation_id')->on('languages')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('branch_id')->on('branches')->references('id')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branches_translations');
    }
};
