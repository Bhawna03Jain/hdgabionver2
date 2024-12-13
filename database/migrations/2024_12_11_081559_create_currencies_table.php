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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->string('currency_code', 3)->unique(); // ISO code (e.g., USD, EUR)
            $table->string('currency_name'); // Full currency name (e.g., US Dollar, Euro)
            $table->string('currency_symbol')->nullable(); // Symbol (e.g., $, €, £)
           $table->boolean('is_base_currency')->default(false); // True if this is the base currency
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
