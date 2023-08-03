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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default('');
            $table->string('img')->nullable();
            $table->string('email')->unique();
            $table->integer('social')->default(0);
            $table->string('phone',10)->nullable();
            $table->string('password');
            $table->string('token',50)->nullable();
            $table->string('gender',10)->default(0);
            $table->date('birthday')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->tinyInteger('level')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->rememberToken();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
