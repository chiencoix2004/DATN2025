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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->string('user_name',100);
            $table->string('user_phone',15);
            $table->string('user_email',100);
            $table->string('user_address',255);
            $table->string('user_note',255);
            $table->string('ship_user_name',100);
            $table->string('ship_user_phone',15);
            $table->string('ship_user_email',100);
            $table->string('ship_user_address',255);
            $table->string('ship_user_note',255);
            $table->enum('status_order',['reorder', 'pending','confirmed','shipping','received','canceled']);
            $table->enum('payment_method',['cod', 'momo-card','momo_qr']);
            $table->integer('total_price');
            $table->dateTime('date_create_order');
            $table->string('code_coupon',100);
            $table->enum('discount_type',['percent', 'fixed']);
            $table->integer('discount');
            $table->enum('shipping_method',['express', 'normal']);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
