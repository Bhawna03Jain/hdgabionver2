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
        Schema::create('manufacturing_configs', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->decimal('cost_per_unit',5,2);
            $table->decimal('cost',5,2)->default((0));
            $table->foreignId('boq_config_id')->constrained('boq_configs')->onDelete('cascade'); // Relation to boqconfig
            $table->unique(['boq_config_id', 'code']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manufacturing_configs');
    }
};
