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
        Schema::table('orders', function (Blueprint $table) {
            $table->tinyInteger('status')->default(0)->after('product_total');
            $table->timestamp('paid_at')->nullable()->after('status');
            $table->timestamp('cancelled_at')->nullable()->after('paid_at');
            $table->timestamp('shipped_at')->nullable()->after('cancelled_at');
            $table->timestamp('delivered_at')->nullable()->after('shipped_at');
            $table->timestamp('returned_at')->nullable()->after('delivered_at');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
$table->dropColumn(['status', 'paid_at', 'cancelled_at', 'shipped_at', 'delivered_at', 'returned_at']);
        });
    }
};
