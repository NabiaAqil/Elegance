<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HairServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Hair ki Category banayein
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Hair Styling & Care',
            'slug' => 'hair-styling-care',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Hair Services ka data
        $hairServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Haircut & Styling',
                'slug' => 'haircut-styling',
                'image' => 'hair/hair1.jfif', 
                'short_description' => 'Precision cuts and blow-dry for a perfect everyday look.',
                'brands_used' => 'L\'Oreal, Schwarzkopf, ghd',
                'price' => 2500,
                'duration' => 45,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Hair Coloring',
                'slug' => 'hair-coloring',
                'image' => 'hair/hair2.jpg',
                'short_description' => 'Vibrant global colors, balayage, and highlights.',
                'brands_used' => 'Wella, Redken, Olaplex',
                'price' => 6000,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Keratin Treatment',
                'slug' => 'keratin-treatment',
                'image' => 'hair/hair3.avif',
                'short_description' => 'Frizz-free, smooth and manageable hair for months.',
                'brands_used' => 'Brazilian Blowout, Keratin Complex',
                'price' => 12000,
                'duration' => 180,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Hair Spa & Deep Conditioning',
                'slug' => 'hair-spa-deep-conditioning',
                'image' => 'hair/hair4.jfif',
                'short_description' => 'Intense repair and nourishment for damaged hair.',
                'brands_used' => 'Moroccanoil, Kerastase',
                'price' => 3500,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Hair Extensions',
                'slug' => 'hair-extensions',
                'image' => 'hair/hair5.jfif',
                'short_description' => 'Add length and volume instantly with premium extensions.',
                'brands_used' => 'Great Lengths, Luxy Hair',
                'price' => 15000,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Party Hair Styling',
                'slug' => 'party-hair-styling',
                'image' => 'hair/hair6.jfif',
                'short_description' => 'Elegant braids, buns, and curls for special events.',
                'brands_used' => 'Schwarzkopf, TIGI',
                'price' => 3000,
                'duration' => 60,
            ],
        ];

        // 3. Data insert karein
        foreach ($hairServices as $service) {
            DB::table('services')->insert([
                'category_id' => $service['category_id'],
                'name' => $service['name'],
                'slug' => $service['slug'],
                'image' => $service['image'],
                'short_description' => $service['short_description'],
                'brands_used' => $service['brands_used'],
                'price' => $service['price'],
                'duration' => $service['duration'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}