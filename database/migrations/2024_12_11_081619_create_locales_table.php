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
        Schema::create('locales', function (Blueprint $table) {
            $table->id();
            $table->string('locale_code')->unique(); // Locale code like en_US, fr_FR
            $table->string('language'); // Human-readable language name (e.g., English, French)
            $table->foreignId('country_id')->nullable()->constrained('countries')->onDelete('set null'); // Foreign key to countries table
            $table->string('date_format'); // Date format (e.g., Y-m-d)
            $table->string('time_format')->nullable(); // Time format (e.g., H:i)
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->onDelete('set null'); // Foreign key to currencies table
            $table->string('timezone'); // Timezone (e.g., America/New_York)
            $table->enum('direction', ['ltr', 'rtl'])->default('ltr');
            $table->string('hostname');
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->softDeletes(); // Adds `deleted_at` column for soft deletes
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('locales');
    }
};
