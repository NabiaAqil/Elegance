<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpaServiceSeeder extends Seeder
{
    public function run()
    {
        // 1. Spa Category banayein
        $categoryId = DB::table('categories')->insertGetId([
            'name' => 'Spa & Relaxation',
            'slug' => 'spa-relaxation',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 2. Spa Services ka data
        $spaServices = [
            [
                'category_id' => $categoryId,
                'name' => 'Full Body Massage',
                'slug' => 'full-body-massage',
                'image' => 'spa/s1.jfif', 
                'short_description' => 'Relaxing Swedish or Deep Tissue massage for full body.',
                'brands_used' => 'Aroma Oils, Herbal Extracts',
                'price' => 5000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Aroma Therapy',
                'slug' => 'aroma-therapy',
                'image' => 'spa/s2.jfif',
                'short_description' => 'Therapeutic massage with essential oils.',
                'brands_used' => 'Lavender, Eucalyptus, Tea Tree Oils',
                'price' => 6000,
                'duration' => 75,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Hot Stone Massage',
                'slug' => 'hot-stone-massage',
                'image' => 'spa/s3.jfif',
                'short_description' => 'Warm stones to relieve muscle tension.',
                'brands_used' => 'Basalt Stones, Massage Oils',
                'price' => 7000,
                'duration' => 90,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Body Scrub & Polish',
                'slug' => 'body-scrub-polish',
                'image' => 'spa/s4.jfif',
                'short_description' => 'Exfoliation to remove dead skin and reveal glow.',
                'brands_used' => 'Coffee Scrub, Sea Salt, Sugar Scrub',
                'price' => 4000,
                'duration' => 60,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Reflexology',
                'slug' => 'reflexology',
                'image' => 'spa/s5.jfif',
                'short_description' => 'Pressure point massage on feet for overall wellness.',
                'brands_used' => 'Foot Creams, Essential Oils',
                'price' => 3000,
                'duration' => 45,
            ],
            [
                'category_id' => $categoryId,
                'name' => 'Head & Shoulder Massage',
                'slug' => 'head-shoulder-massage',
                'image' => 'spa/s6.jfif',
                'short_description' => 'Stress-relieving massage for head and shoulders.',
                'brands_used' => 'Herbal Oils, Coconut Oil',
                'price' => 2500,
                'duration' => 30,
            ],
        ];

        foreach ($spaServices as $service) {
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