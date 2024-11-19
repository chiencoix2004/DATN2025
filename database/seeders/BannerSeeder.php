<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('banners')->insert([
                'banner_position'=> rand(1,4),
                'title'=> 'tiêu đề '.$i,
                'description'=> 'mô tả'.$i,
                'offer_text' => 'nội dung' .$i,
                'img_banner' => "https://product.hstatic.net/1000392326/product/fas33679__k__968k_-_fjd31170__b__998k__1__f3577eb828354bdd9dd4dd48d632ea87_master.jpg"
            ]);
        }
    }
}
