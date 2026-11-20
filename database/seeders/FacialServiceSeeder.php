<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacialServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Pehle Category create karein (Agar pehle se nahi hai)
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Facial & Skin Care',
            'slug' => 'facial-skin-care',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. 6 Facial Services ka data
        $facialServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Signature Glow Facial',
                'slug' => 'signature-glow-facial',
                'image' => 'facial/facial1.webp', // Yahan image ka path ayega
                'short_description' => 'Deep cleansing aur hydration ke liye perfect facial.',
                'brands_used' => 'Casmara Cleanser, O3+ Serum, CeraVe Moisturizer',
                'price' => 3500,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Anti-Aging Collagen Facial',
                'slug' => 'anti-aging-collagen-facial',
                'image' => 'facial/facial2.jfif',
                'short_description' => 'Fine lines aur wrinkles ko kam karne ke liye.',
                'brands_used' => 'Thalgo Collagen Mask, L\'Oreal Serum',
                'price' => 4500,
                'duration' => 75,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Acne Clear Purifying Facial',
                'slug' => 'acne-clear-purifying-facial',
                'image' => 'facial/facial3.jfif',
                'short_description' => 'Oily aur acne-prone skin ke liye deep cleaning.',
                'brands_used' => 'Neutrogena Cleanser, La Roche-Posay Effaclar',
                'price' => 4000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'HydraFacial',
                'slug' => 'hydrafacial',
                'image' => 'facial/facial4.avif',
                'short_description' => 'Dry skin aur blackheads ke liye deep hydration.',
                'brands_used' => 'HydraFacial Dermabuilder, Hyaluronic Acid',
                'price' => 5000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Whitening / Brightening Facial',
                'slug' => 'whitening-brightening-facial',
                'image' => 'facial/facial5.jfif',
                'short_description' => 'De-tan aur pigmentation hatane ke liye.',
                'brands_used' => 'O3+ Whitening Mask, Vitamin C Serum',
                'price' => 3800,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Gold / Diamond Luxury Facial',
                'slug' => 'gold-diamond-luxury-facial',
                'image' => 'facial/facial6.jfif',
                'short_description' => 'Bridal aur party ke liye luxury glow treatment.',
                'brands_used' => '24K Gold Leaf Mask, Diamond Dust Scrub',
                'price' => 8000,
                'duration' => 90,
            ],
        ];

        foreach ($facialServices as $service) {
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