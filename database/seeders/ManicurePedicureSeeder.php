<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NailServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Nails ki Category banayein
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Manicure & Pedicure',
            'slug' => 'manicure-pedicure',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Nail Services ka data
        $nailServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Classic Manicure & Pedicure',
                'slug' => 'classic-manicure-pedicure',
                'image' => 'nails/nail1.jfif', 
                'short_description' => 'Basic nail care and polish for a clean, everyday look.',
                'brands_used' => 'OPI, Essie',
                'price' => 1500,
                'duration' => 45,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Spa Manicure & Pedicure',
                'slug' => 'spa-manicure-pedicure',
                'image' => 'nails/nail2.jfif',
                'short_description' => 'Relaxing scrub, massage, and premium polish.',
                'brands_used' => 'CND, Cuccio',
                'price' => 3000,
                'duration' => 90,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Gel Nail Extensions',
                'slug' => 'gel-nail-extensions',
                'image' => 'nails/nail3.jfif',
                'short_description' => 'Long-lasting and natural-looking gel extensions.',
                'brands_used' => 'Gelish, IBD',
                'price' => 4500,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Acrylic Nails',
                'slug' => 'acrylic-nails',
                'image' => 'nails/nail4.jfif',
                'short_description' => 'Strong and durable acrylic nail extensions.',
                'brands_used' => 'Kiara Sky, Mia Secret',
                'price' => 5000,
                'duration' => 120,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Nail Art (Custom Designs)',
                'slug' => 'nail-art',
                'image' => 'nails/nail5.jpg',
                'short_description' => 'Custom, hand-painted nail art designs.',
                'brands_used' => 'Various',
                'price' => 2000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Nail Repair & Removal',
                'slug' => 'nail-repair-removal',
                'image' => 'nails/nail6.jpg',
                'short_description' => 'Safe removal of extensions and nail repair.',
                'brands_used' => 'Acetone, Cuticle Oil',
                'price' => 1000,
                'duration' => 30,
            ],
        ];

        foreach ($nailServices as $service) {
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