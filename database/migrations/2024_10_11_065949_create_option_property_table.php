<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('options_properties', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->foreignUuid('option_id')
                ->constrained('options', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignUuid('property_id')
                ->constrained('properties', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('options_properties');
    }
};
