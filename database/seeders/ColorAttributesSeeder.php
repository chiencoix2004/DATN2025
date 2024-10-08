<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ColorAttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $colors = ['Đỏ', 'Xanh', 'Vàng', 'Trắng', 'Đen', 'Cam', 'Tím', 'Hồng', 'Xám', 'Nâu'];
        foreach ($colors as $color) {
            DB::table('color_attributes')->insert([
                'color_value' => $color
            ]);
        }
    }
}
