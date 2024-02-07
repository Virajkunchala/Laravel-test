<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // adding Product name to the table its same Like ALTER operation
    public function up(): void
    {
        Schema::table('coffee_sales', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('coffee_sales', function (Blueprint $table) {
            $table->dropPrimary('product_id'); // Drop the primary key 
            $table->dropColumn('product_id'); // Drop the product_id column
        });
    }
};
