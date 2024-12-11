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
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            // $table->integer('parent_id')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // self-referencing foreign key for parent category
            $table->string('category_name');
            $table->string('category_image')->nullable();
            // $table->float('category_discount')->nullable(); // assuming discount is a decimal value
            $table->text('description')->nullable();
            $table->string('url')->unique();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->boolean('status')->default(1); // assuming status is a boolean (active/inactive)
            $table->timestamps(); // created_at and updated_at timestamps
            $table->softDeletes(); // Adds the deleted_at column
            $table->unique(['category_name', 'url']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
