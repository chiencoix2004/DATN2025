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
        Schema::table('comments', function (Blueprint $table) {
            // Sửa giá trị mặc định của cột status thành 2
            $table->integer('status')->default(2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            // Khôi phục lại giá trị mặc định của cột status về 1 (hoặc giá trị trước đó)
            $table->integer('status')->default(1)->change();
        });
    }
};

