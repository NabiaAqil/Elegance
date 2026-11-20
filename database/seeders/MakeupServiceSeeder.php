<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MakeupServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Makeup ki Category banayein
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Makeup Services',
            'slug' => 'makeup-services',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Makeup Services ka data
        $makeupServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Party Makeup',
                'slug' => 'party-makeup',
                'image' => 'makeup/make1.jfif', // Aapki image ka naam
                'short_description' => 'Glamorous look for your special parties and events.',
                'brands_used' => 'MAC, Huda Beauty, NARS',
                'price' => 4500,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Engagement Makeup',
                'slug' => 'engagement-makeup',
                'image' => 'makeup/make2.jpeg',
                'short_description' => 'Soft and elegant look for your special day.',
                'brands_used' => 'Anastasia Beverly Hills, Too Faced',
                'price' => 12000,
                'duration' => 90,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Natural / Day Makeup',
                'slug' => 'natural-day-makeup',
                'image' => 'makeup/make3.jfif',
                'short_description' => 'Fresh and light makeup for daily wear.',
                'brands_used' => 'Maybelline, Clinique, Fenty Beauty',
                'price' => 2500,
                'duration' => 45,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Evening / Glam Makeup',
                'slug' => 'evening-glam-makeup',
                'image' => 'makeup/make4.jpg',
                'short_description' => 'Bold and glamorous makeup for night events.',
                'brands_used' => 'Charlotte Tilbury, Dior',
                'price' => 5000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Smokey Eye Makeup',
                'slug' => 'smokey-eye-makeup',
                'image' => 'makeup/make5.jfif',
                'short_description' => 'Dramatic smokey eyes for a bold look.',
                'brands_used' => 'Urban Decay, Nyx Cosmetics',
                'price' => 3500,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Photoshoot / HD Makeup',
                'slug' => 'photoshoot-hd-makeup',
                'image' => 'makeup/make6.jfif',
                'short_description' => 'HD makeup for camera-ready perfection.',
                'brands_used' => 'Make Up For Ever, Kryolan',
                'price' => 6000,
                'duration' => 90,
            ],
        ];

        // 3. Data insert karein
        foreach ($makeupServices as $service) {
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