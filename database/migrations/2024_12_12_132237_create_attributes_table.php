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
        Schema::create('attributes', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('name'); // Attribute name (e.g., Color, Size)
            $table->string('value'); // Attribute value (e.g., Red, Large)
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade'); // Foreign key constraint
            $table->softDeletes(); // Soft deletes (deleted_at column)
            $table->timestamps(); // Created at and updated at timestamps

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
