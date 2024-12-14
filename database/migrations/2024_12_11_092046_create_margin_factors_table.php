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
        Schema::create('margin_factors', function (Blueprint $table) {

            $table->id(); // Auto-incrementing ID
            $table->foreignId('country_id')->constrained('countries')->onDelete('cascade'); // Foreign key to countries table
            $table->decimal('margin_factor', 8, 2)->nullable(); // Country-specific margin factor
            $table->decimal('discount_per', 8, 2)->default(0); // Country-specific margin factor
            $table->unique('country_id'); // Ensures country_id is unique
            $table->integer('cost')->default(0);
            $table->foreignId('boq_config_id')->constrained('boq_configs')->onDelete('cascade'); // Relation to boqconfig

            $table->softDeletes(); // Adds deleted_at column for soft delete
            $table->timestamps(); // Adds created_at and updated_at columns

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('margin_factors');
    }
};
