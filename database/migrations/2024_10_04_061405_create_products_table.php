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
            $table->id();
            $table->foreignId('category_id')->constrained('categories','id');
            $table->string('name',255);
            $table->string('sku',255);
            $table->integer('price_regular');
            $table->integer('price_sale');
            $table->integer('discount_percent');
            $table->text('description');
            $table->text('material');
            $table->bigInteger('views')->default(0);
            $table->bigInteger('quantity');
            $table->tinyInteger('is_active');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->timestamps();
            $table->softDeletes();
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
