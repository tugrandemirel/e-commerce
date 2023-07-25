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
        Schema::create('application_sellers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('county_id')->constrained('counties');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('company');
            $table->string('identity_number')->unique();
            $table->boolean('agreement')->default(false);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_sellers');
    }
};
