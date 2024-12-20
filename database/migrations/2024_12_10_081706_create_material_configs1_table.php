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
        Schema::create('material_configs1', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('article_no');
            $table->string('hs_code')->nullable();
            $table->string('item_name');
            $table->string('length')->nullable();
            $table->integer('no')->nullable();
            $table->decimal('weight_per_cm', 10, 6)->nullable();
            $table->decimal('unit_price', 8, 2)->nullable();
            $table->decimal('weight_kg', 8, 4)->nullable();
            $table->decimal('price', 8, 2)->default(0.0);
            $table->decimal('margin_factor', 5, 2)->default(1);
            $table->decimal('selling_price', 8, 2)->default(0.0);
            $table->string(column: 'specs')->nullable();
            $table->string(column: 'sides')->nullable();
            $table->string(column: 'maze')->nullable();
            $table->boolean('common')->default(false);
            $table->boolean('status')->default(true);
            $table->foreignId('boq_config_id')->constrained('boq_configs')->onDelete('cascade'); // Relation to boqconfig
            // $table->foreignId('product_id')->constrained('products');
            $table->unique(['boq_config_id', 'item_code']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('material_configs');
    }
};
