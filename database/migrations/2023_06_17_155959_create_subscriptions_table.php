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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->text('name_en')->nullable();
            $table->text('name_ar')->nullable();
            $table->string('national_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_code')->nullable();
            $table->string('email')->unique();
            $table->date('birthdate')->nullable();
            $table->boolean('sex');
            $table->string('currency')->nullable();
            $table->string('work_place')->nullable();
            $table->string('membership_number')->nullable();
            $table->longText('address')->nullable();
            $table->integer('type');
            $table->string('nominal_shares');
            $table->string('administrative_shares');
            $table->string('shares_count');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
