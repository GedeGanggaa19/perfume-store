<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PerfumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = now();
        DB::table('perfumes')->insert([
            'name' => 'Tender Amber',
            'image' => 'https://static.zara.net/assets/public/ed20/91db/f85a43b28dfc/9911fa1bd616/20220257999-e1/20220257999-e1.jpg?ts=1724685019567&w=563',
            'category_id' => 5,
            'brand_id' => 2,
            'price' => 699000,
            'stock' => 50,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('perfumes')->insert([
            'name' => 'Vibrant Leather',
            'image' => 'https://static.zara.net/assets/public/d3c9/62b2/29f2472f8202/ef02e2f6f169/20210786999-e2/20210786999-e2.jpg?ts=1724685029184&w=563',
            'category_id' => 4,
            'brand_id' => 2,
            'price' => 399000,
            'stock' => 20,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('perfumes')->insert([
            'name' => 'Cape Town',
            'image' => 'https://static.zara.net/assets/public/d3c9/62b2/29f2472f8202/ef02e2f6f169/20210786999-e2/20210786999-e2.jpg?ts=1724685029184&w=563',
            'category_id' => 2,
            'brand_id' => 2,
            'price' => 499000,
            'stock' => 60,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('perfumes')->insert([
            'name' => 'Alpha',
            'image' => 'https://madeforhmns.com/cdn/shop/files/Alpha4.png?v=1718072150',
            'category_id' => 3,
            'brand_id' => 3,
            'price' => 399000,
            'stock' => 67,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('perfumes')->insert([
            'name' => 'The Prestige',
            'image' => 'https://madeforhmns.com/cdn/shop/files/1_11f9f47d-98c9-424c-afee-9b552ce9f44c.png?v=1709023598',
            'category_id' => 4,
            'brand_id' => 3,
            'price' => 299000,
            'stock' => 77,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

    }
}
