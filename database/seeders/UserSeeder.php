<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 100; $i++) {
            DB::table('users')->insert([
                'user_name' => "Uy$i",
                'phone' => "098765432$i",
                'email' => "dophuonguy$i@gmail.com",
                'password' => bcrypt('pw12345678'),
                'address' => "Ba Vì $i",
                'user_image' => "https://mcdn.coolmate.me/image/January2023/pho-thoi-trang-870_220.jpg",
                'roles_id' => rand(1, 6),
                'full_name' => "Đỗ Phương Uy $i",
                'verify' => 1,
                'status' => 'active',
            ]);
        }
    }
}