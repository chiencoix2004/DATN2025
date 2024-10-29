<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            UserSeeder::class,
            CouponSeeder::class,
            BannerSeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
            OrderSeeder::class,
            OrderDetailSeeder::class,
            NotificationSeeder::class,
            // ProductImageSeeder::class,
            // ColorAttributesSeeder::class,
            // SizeAttributeSeeder::class,
            // ProductVariantSeeder::class,
            // VariantValueSeeder::class
        ]);
    }
}
