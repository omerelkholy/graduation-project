<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->decimal('order_price', 10, 2)->after('products');
            $table->decimal('shipping_price', 10, 2)->after('order_price');
            $table->dropColumn('total_price');
            $table->decimal('total_price', 10, 2)->after('shipping_price');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['order_price', 'shipping_price']);
            $table->decimal('total_price', 10, 2)->change();
        });
    }
};
