<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
    {
        $orderStatuses = Order::STATUS_ORDER;
        $paymentStatus = Order::STATUS_PAYMENT;
        $paymentMethods = Order::METHOD_PAYMENT;
        $shippingMethods = Order::METHOD_SHIPPING;

        for ($i = 1; $i <= 300; $i++) {
            DB::table('orders')->insert([
                'users_id' => rand(2, 10),
                'user_name' => "uy" . rand(1, 10),
                'user_phone' => "098765432" . rand(1, 10),
                'user_email' => "uy" . rand(1, 10) . "@gmail.com",
                'user_address' => "Hà Nội $i",
                'user_note' => "Ghi chú $i",
                'total_price' => rand(100000, 5000000),
                'status_order' => $orderStatuses[array_rand($orderStatuses)],
                'payment_method' => $paymentMethods[array_rand($paymentMethods)],
                'status_payment' => $paymentStatus[array_rand($paymentStatus)],
                'date_create_order' => now(),
                'discount' => 0,
                'shipping_method' => $shippingMethods[array_rand($shippingMethods)]
            ]);
        }
    }
}
