<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Slider;
use Illuminate\Support\Facades\Hash;

class AdminAndSliderSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Create/Update Admin User
        User::updateOrCreate(
            ['email' => 'saad@gmail.com'],
            [
                'name' => 'Engr Saad',
                'password' => Hash::make('123456'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Seed Hero Sliders if empty
        if (Slider::count() === 0) {
            $sliders = [
                [
                    'title' => 'WE BELIEVE QUALITY PRODUCES LUXURY',
                    'highlight_word' => 'LUXURY',
                    'subtitle' => 'Turnkey Interior Architecture & Joinery Manufacturing in Bangladesh',
                    'button_text' => 'Get Free Consultation',
                    'button_url' => '#consultationModal',
                    'catalogue_url' => 'https://ditstudio.com.bd/assets/e-catalogue.pdf',
                    'image' => 'images/banner-1.webp',
                    'sort_order' => 1,
                    'is_active' => true,
                ],
                [
                    'title' => 'Design your dream home from scratch',
                    'highlight_word' => 'dream home',
                    'subtitle' => 'Bespoke 3D Architectural Spatial Planning & In-House Custom Joinery',
                    'button_text' => 'Get Free Consultation',
                    'button_url' => '#consultationModal',
                    'catalogue_url' => 'https://ditstudio.com.bd/assets/e-catalogue.pdf',
                    'image' => 'images/banner-2.webp',
                    'sort_order' => 2,
                    'is_active' => true,
                ],
                [
                    'title' => 'Specialized in home interior design',
                    'highlight_word' => 'home interior',
                    'subtitle' => 'Master Bedrooms, Living Rooms, Modular Kitchens & Luxury Duplexes',
                    'button_text' => 'Get Free Consultation',
                    'button_url' => '#consultationModal',
                    'catalogue_url' => 'https://ditstudio.com.bd/assets/e-catalogue.pdf',
                    'image' => 'images/banner-3.webp',
                    'sort_order' => 3,
                    'is_active' => true,
                ],
                [
                    'title' => 'Crafting bespoke luxury living spaces',
                    'highlight_word' => 'bespoke luxury',
                    'subtitle' => 'East Badda Factory Precision with German Fittings & Lifetime Support',
                    'button_text' => 'Get Free Consultation',
                    'button_url' => '#consultationModal',
                    'catalogue_url' => 'https://ditstudio.com.bd/assets/e-catalogue.pdf',
                    'image' => 'images/banner-4.webp',
                    'sort_order' => 4,
                    'is_active' => true,
                ],
            ];

            foreach ($sliders as $s) {
                Slider::create($s);
            }
        }
    }
}
