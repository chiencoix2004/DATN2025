<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Tạo danh mục gốc
        $rootCategories = [];
        for ($i = 1; $i <= 10; $i++) {
            $rootCategoryId = DB::table('categories')->insertGetId([
                'name' => "Danh mục gốc $i",
                'parent_id' => 0,
                'slug' => "danh-muc-goc-$i",
                'image_cover' => "https://cdn.pixabay.com/photo/2024/06/17/16/39/girl-8836068_640.jpg",
                'note' => "Ghi chú cho danh mục gốc $i"
            ]);
            $rootCategories[] = $rootCategoryId;
        }

        // Tạo danh mục con cho danh mục gốc
        $level1Categories = [];
        foreach ($rootCategories as $rootCategoryId) {
            for ($i = 1; $i <= 5; $i++) {
                $level1CategoryId = DB::table('categories')->insertGetId([
                    'name' => "Danh mục cấp 1 - $i của danh mục $rootCategoryId",
                    'parent_id' => $rootCategoryId,
                    'slug' => "danh-muc-cap-1-$i-cua-danh-muc-$rootCategoryId",
                    'image_cover' => "https://cdn.pixabay.com/photo/2024/06/17/16/39/girl-8836068_640.jpg",
                    'note' => "Ghi chú cho danh mục cấp 1 - $i"
                ]);
                $level1Categories[] = $level1CategoryId;
            }
        }

        // Tạo danh mục con cho danh mục cấp 1
        foreach ($level1Categories as $level1CategoryId) {
            for ($i = 1; $i <= 3; $i++) {
                DB::table('categories')->insert([
                    'name' => "Danh mục cấp 2 - $i của danh mục $level1CategoryId",
                    'parent_id' => $level1CategoryId,
                    'slug' => "danh-muc-cap-2-$i-cua-danh-muc-$level1CategoryId",
                    'image_cover' => "https://cdn.pixabay.com/photo/2024/06/17/16/39/girl-8836068_640.jpg",
                    'note' => "Ghi chú cho danh mục cấp 2 - $i"
                ]);
            }
        }
    }
}
