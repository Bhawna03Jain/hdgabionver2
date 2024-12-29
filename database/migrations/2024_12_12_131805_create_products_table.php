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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->string('article_no')->unique();
            $table->string('hs_code')->nullable();
            $table->string('sku')->unique(); // URL or path to main image
            $table->string('name'); // Product name
            // $table->decimal('weight_per_unit', 10, 6)->nullable();
            // $table->integer('qty')->default(1); // Stock count
            // $table->decimal('unit_price', 8, 2)->default(0);
            // $table->string(column: 'unit_type')->nullable();//per kg ,per piece
            // // $table->string(column: 'specs')->nullable();
            $table->decimal('total_price', 10, 2)->default(0); // Price with precision
            $table->integer('stock')->default(0); // Stock count
            $table->boolean('is_active')->default(true); // Active/inactive flag
            $table->boolean('is_shown_to_fronend')->default(true); // Active/inactive flag


            $table->boolean('should_display')->default(true); // Active/inactive flag
            $table->string('main_image'); // URL or path to main image
            $table->json('relevant_images')->nullable();
            $table->softDeletes(); // Soft deletes (deleted_at column)
            $table->timestamps(); // Created at and updated at timestamps

            // Foreign key constraint
               });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
