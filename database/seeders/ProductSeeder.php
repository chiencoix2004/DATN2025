<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        for ($i = 1; $i <= 20; $i++) {
            DB::table('products')->insert([
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'name' => "Áo Cộc $i",
                'sku' => "ao-coc-$i",
                'price_regular' => rand(100000, 1000000),
                'price_sale' => rand(80000, 900000),
                'discount_percent' => rand(10, 50),
                'description' => "Sản phẩm chất lắm thề $i",
                'material' => "Chất liệu: vải thô $i",
                'quantity' => rand(10, 100),
                'is_active' => 1,
                'start_date' => now(),
                'end_date' => now()->addDays(30)
            ]);
        }
    }
}
