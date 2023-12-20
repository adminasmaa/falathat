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
        Schema::create('front_members', function (Blueprint $table) {
            $table->id();
            $table->string('name_en')->nullable();
            $table->string('name_ar')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->string('password');
            $table->string('image')->nullable();
            $table->string('national_id')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->date('birthdate')->nullable();
            $table->boolean('sex')->nullable();
            $table->string('currency')->nullable();
            $table->string('work_place')->nullable();
            $table->string('membership_number')->nullable();
            $table->longText('address')->nullable();
            $table->integer('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('front_members');
    }
};
