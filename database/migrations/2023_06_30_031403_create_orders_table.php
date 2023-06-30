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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table
                ->foreignId('address_id')
                ->nullable()
                ->constrained('addresses')
                ->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('product_title');
            $table->string('product_slug');
            $table->string('product_bid_price');
            $table->string('product_price');
            $table->string('product_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
