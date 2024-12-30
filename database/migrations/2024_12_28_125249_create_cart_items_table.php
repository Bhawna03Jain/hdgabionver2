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
        Schema::create('cart_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Associate cart with a user
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade'); // Associate cart with a user

            // $table->uuid('guest_id')->nullable();
            // $table->string('name'); // Product name
            $table->integer('quantity'); // Quantity
            // $table->decimal('price', 10, 2); // Price per unit
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};
