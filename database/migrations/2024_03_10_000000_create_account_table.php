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
        Schema::create('accounts', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('email');
            $table->string('password');
            $table->boolean('is_verified');
        });

        Schema::create('account_numbers', function (Blueprint $table) {
            $table->integer('number')->autoIncrement();
            $table->string('account_id');
            $table->foreign('account_id')->references('id')->on('accounts');
        });

        Schema::create('account_verifications', function (Blueprint $table) {
            $table->string('account_id')->primary();
            $table->string('verification_id');
            $table->foreign('account_id')->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('account_verifications');
        Schema::dropIfExists('account_numbers');
        Schema::dropIfExists('accounts');
    }
};
