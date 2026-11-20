<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicesSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Facial & Skin Care',
                'slug' => 'facial-skin-care',
                'services' => [
                    ['Signature Glow Facial', 'signature-glow-facial', 'facial/facial1.webp', 'Deep cleansing aur hydration ke liye perfect facial.', 'Casmara Cleanser, O3+ Serum, CeraVe Moisturizer', 3500, 60],
                    ['Anti-Aging Collagen Facial', 'anti-aging-collagen-facial',' facial/facial2.jfif', 'Fine lines aur wrinkles ko kam karne ke liye.', 'Thalgo Collagen Mask, L\'Oreal Serum', 4500, 75],
                    ['Acne Clear Purifying Facial', 'acne-clear-purifying-facial', 'facial/facial3.jfif', 'Oily aur acne-prone skin ke liye deep cleaning.', 'Neutrogena Cleanser, La Roche-Posay Effaclar', 4000, 60],
                    ['HydraFacial', 'hydrafacial', 'facial/facial4.avif', 'Dry skin aur blackheads ke liye deep hydration.', 'HydraFacial Dermabuilder, Hyaluronic Acid', 5000, 60],
                    ['Whitening / Brightening Facial', 'whitening-brightening-facial','facial/facial5.jfif', 'De-tan aur pigmentation ke liye facial treatment.', 'O3+ Whitening Mask, Vitamin C Serum', 3800, 60],
                    ['Gold / Diamond Luxury Facial', 'gold-diamond-luxury-facial', 'facial/facial6.jfif', 'Bridal aur party ke liye luxury facial treatment.', '24K Gold Leaf Mask, Diamond Dust Scrub', 8000, 90],
                ],
            ],

            [
                'name' => 'Makeup Services',
                'slug' => 'makeup-services',
                'services' => [
                    ['Party Makeup', 'party-makeup', 'makeup/make1.jfif', 'Glamorous look for your special parties and events.', 'MAC, Huda Beauty, NARS', 4500, 60],
                    ['Engagement Makeup', 'engagement-makeup', 'makeup/make2.jpeg', 'Soft and elegant look for your special day.', 'Anastasia Beverly Hills, Too Faced', 12000, 90],
                    ['Natural / Day Makeup', 'natural-day-makeup', 'makeup/make3.jfif', 'Fresh and light makeup for daily wear.', 'Maybelline, Clinique, Fenty Beauty', 2500, 45],
                    ['Evening / Glam Makeup', 'evening-glam-makeup', 'makeup/make4.jpg', 'Bold and glamorous makeup for night events.', 'Charlotte Tilbury, Dior', 5000, 60],
                    ['Smokey Eye Makeup', 'smokey-eye-makeup', 'makeup/make5.jfif', 'Dramatic smokey eyes for a bold look.', 'Urban Decay, Nyx Cosmetics', 3500, 60],
                    ['Photoshoot / HD Makeup', 'photoshoot-hd-makeup', 'makeup/make6.jfif', 'HD makeup for camera-ready perfection.', 'Make Up For Ever, Kryolan', 6000, 90],
                ],
            ],

            [
                'name' => 'Bridal Makeup',
                'slug' => 'bridal-makeup',
                'services' => [
                    ['Classic Bridal Makeup', 'classic-bridal-makeup', 'bridal/bridal1.jfif', 'Timeless and elegant look for the traditional bride.', 'MAC, Bobbi Brown, Huda Beauty', 25000, 120],
                    ['HD Bridal Makeup', 'hd-bridal-makeup', 'bridal/bridal2.jpg', 'High-definition makeup for flawless photography.', 'Make Up For Ever, Charlotte Tilbury', 35000, 150],
                    ['Airbrush Bridal Makeup', 'airbrush-bridal-makeup', 'bridal/bridal3.jpg', 'Lightweight and long-lasting airbrush finish.', 'Temptu, Dinair', 45000, 150],
                    ['Nikkah / Engagement Bridal Makeup', 'nikkah-engagement-bridal-makeup', 'bridal/bridal4.jfif', 'Soft and radiant look for your special day.', 'NARS, Anastasia Beverly Hills', 20000, 90],
                    ['Walima / Reception Bridal Makeup', 'walima-reception-bridal-makeup', 'bridal/bridal5.jfif', 'Glamorous and bold look for the reception.', 'Dior, Too Faced, Fenty Beauty', 30000, 120],
                    ['Signature Luxury Bridal Makeup', 'signature-luxury-bridal-makeup', 'bridal/bridal6.jfif', 'Our premium package with exclusive luxury products.', 'Chanel, Tom Ford, Guerlain', 60000, 180],
                ],
            ],

            [
                'name' => 'Hair Styling & Care',
                'slug' => 'hair-styling-care',
                'services' => [
                    ['Haircut & Styling', 'haircut-styling', 'hair/hair1.jfif', 'Precision cuts and blow-dry for a perfect everyday look.', 'L\'Oreal, Schwarzkopf, ghd', 2500, 45],
                    ['Hair Coloring', 'hair-coloring', 'hair/hair2.jpg', 'Vibrant global colors, balayage, and highlights.', 'Wella, Redken, Olaplex', 6000, 120],
                    ['Keratin Treatment', 'keratin-treatment', 'hair/hair3.avif', 'Frizz-free, smooth and manageable hair.', 'Brazilian Blowout, Keratin Complex', 12000, 180],
                    ['Hair Spa & Deep Conditioning', 'hair-spa-deep-conditioning', 'hair/hair4.jfif', 'Intense repair and nourishment for damaged hair.', 'Moroccanoil, Kerastase', 3500, 60],
                    ['Hair Extensions', 'hair-extensions', 'hair/hair5.jfif', 'Add length and volume with premium extensions.', 'Great Lengths, Luxy Hair', 15000, 120],
                    ['Party Hair Styling', 'party-hair-styling', 'hair/hair6.jfif', 'Elegant braids, buns, and curls for special events.', 'Schwarzkopf, TIGI', 3000, 60],
                ],
            ],

            [
                'name' => 'Manicure & Pedicure',
                'slug' => 'manicure-pedicure',
                'services' => [
                    ['Classic Manicure & Pedicure', 'classic-manicure-pedicure', 'nails/nail1.jfif', 'Basic nail care and polish for a clean everyday look.', 'OPI, Essie', 1500, 45],
                    ['Spa Manicure & Pedicure', 'spa-manicure-pedicure', 'nails/nail2.jfif', 'Relaxing scrub, massage, and premium polish.', 'CND, Cuccio', 3000, 90],
                    ['Gel Nail Extensions', 'gel-nail-extensions', 'nails/nail3.jfif', 'Long-lasting and natural-looking gel extensions.', 'Gelish, IBD', 4500, 120],
                    ['Acrylic Nails', 'acrylic-nails', 'nails/nail4.jfif', 'Strong and durable acrylic nail extensions.', 'Kiara Sky, Mia Secret', 5000, 120],
                    ['Nail Art (Custom Designs)', 'nail-art', 'nails/nail5.jpg', 'Custom, hand-painted nail art designs.', 'Various', 2000, 60],
                    ['Nail Repair & Removal', 'nail-repair-removal', 'nails/nail6.jpg', 'Safe removal of extensions and nail repair.', 'Acetone, Cuticle Oil', 1000, 30],
                ],
            ],

            [
                'name' => 'Spa & Relaxation',
                'slug' => 'spa-relaxation',
                'services' => [
                    ['Full Body Massage', 'full-body-massage', 'spa/s1.jfif', 'Relaxing Swedish or Deep Tissue massage.', 'Aroma Oils, Herbal Extracts', 5000, 60],
                    ['Aroma Therapy', 'aroma-therapy', 'spa/s2.jfif', 'Therapeutic massage with essential oils.', 'Lavender, Eucalyptus, Tea Tree Oils', 6000, 75],
                    ['Hot Stone Massage', 'hot-stone-massage', 'spa/s3.jfif', 'Warm stones to relieve muscle tension.', 'Basalt Stones, Massage Oils', 7000, 90],
                    ['Body Scrub & Polish', 'body-scrub-polish', 'spa/s4.jfif', 'Exfoliation treatment for smooth skin.', 'Coffee Scrub, Sea Salt, Sugar Scrub', 4000, 60],
                    ['Reflexology', 'reflexology', 'spa/s5.jfif', 'Pressure point massage on feet for overall wellness.', 'Foot Creams, Essential Oils', 3000, 45],
                    ['Head & Shoulder Massage', 'head-shoulder-massage', 'spa/s6.jfif', 'Relaxing massage for head and shoulders.', 'Herbal Oils, Coconut Oil', 2500, 30],
                ],
            ],
        ];

        foreach ($categories as $category) {

            DB::table('categories')->updateOrInsert(
                ['slug' => $category['slug']],
                [
                    'name' => $category['name'],
                    'updated_at' => now(),
                    'created_at' => now(),
                ]
            );

            $categoryId = DB::table('categories')
                ->where('slug', $category['slug'])
                ->value('id');

            foreach ($category['services'] as $service) {

                DB::table('services')->updateOrInsert(
                    ['slug' => $service[1]],
                    [
                        'category_id' => $categoryId,
                        'name' => $service[0],
                        'image' => $service[2],
                        'short_description' => $service[3],
                        'brands_used' => $service[4],
                        'price' => $service[5],
                        'duration' => $service[6],
                        'updated_at' => now(),
                        'created_at' => now(),
                    ]
                );
            }
        }
    }
}
