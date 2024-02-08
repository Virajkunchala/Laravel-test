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
        Schema::create('coffee_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id'); // Add product_id column
            $table->foreign('product_id')->references('id')->on('products'); // foreign key constraint
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->decimal('selling_price', 8, 2);
            $table->timestamps();
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coffee_sales');
    }
};
