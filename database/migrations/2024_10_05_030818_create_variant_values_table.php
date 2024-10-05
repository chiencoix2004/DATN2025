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
        Schema::create('variant_values', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_variant_id')->constrained('product_variants', 'id');
            $table->foreignId('color_attribute_id')->constrained('color_attributes', 'id');
            $table->foreignId('size_attribute_id')->constrained('size_attributes', 'id');
            $table->string('color_value', 255);
            $table->string('size_value', 255);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('variant_values');
    }
};
