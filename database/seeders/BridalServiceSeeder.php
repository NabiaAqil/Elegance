<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BridalServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Bridal ki Category banayein
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Bridal Makeup',
            'slug' => 'bridal-makeup',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Bridal Services ka data
        $bridalServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Classic Bridal Makeup',
                'slug' => 'classic-bridal-makeup',
                'image' => 'bridal/bridal1.jpg', 
                'short_description' => 'Timeless and elegant look for the traditional bride.',
                'brands_used' => 'MAC, Bobbi Brown, Huda Beauty',
                'price' => 25000,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'HD Bridal Makeup',
                'slug' => 'hd-bridal-makeup',
                'image' => 'bridal/bridal2.jpg',
                'short_description' => 'High-definition makeup for flawless photography.',
                'brands_used' => 'Make Up For Ever, Charlotte Tilbury',
                'price' => 35000,
                'duration' => 150,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Airbrush Bridal Makeup',
                'slug' => 'airbrush-bridal-makeup',
                'image' => 'bridal/bridal3.jpg',
                'short_description' => 'Lightweight and long-lasting airbrush finish.',
                'brands_used' => 'Temptu, Dinair',
                'price' => 45000,
                'duration' => 150,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Nikkah / Engagement Bridal Makeup',
                'slug' => 'nikkah-engagement-bridal-makeup',
                'image' => 'bridal/bridal4.jfif',
                'short_description' => 'Soft and radiant look for your special day.',
                'brands_used' => 'NARS, Anastasia Beverly Hills',
                'price' => 20000,
                'duration' => 90,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Walima / Reception Bridal Makeup',
                'slug' => 'walima-reception-bridal-makeup',
                'image' => 'bridal/bridal5.jfif',
                'short_description' => 'Glamorous and bold look for the reception.',
                'brands_used' => 'Dior, Too Faced, Fenty Beauty',
                'price' => 30000,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Signature Luxury Bridal Makeup',
                'slug' => 'signature-luxury-bridal-makeup',
                'image' => 'bridal/bridal6.jfif',
                'short_description' => 'Our premium package with exclusive luxury products.',
                'brands_used' => 'Chanel, Tom Ford, Guerlain',
                'price' => 60000,
                'duration' => 180,
            ],
        ];

        // 3. Data insert karein
        foreach ($bridalServices as $service) {
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