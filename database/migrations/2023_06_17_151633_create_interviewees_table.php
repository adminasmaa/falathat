<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('interviewees', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_ar');
            $table->string('phone_code');
            $table->string('phone');
            $table->string('email');
            $table->date('birthdate');
            $table->boolean('type');
            $table->text('address');
            $table->string('CV');
            $table->unsignedBigInteger('job_id');
            $table->timestamps();

            $table->foreign('job_id')
                ->on('jobs')
                ->references('id')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('interviewees');
    }
};
