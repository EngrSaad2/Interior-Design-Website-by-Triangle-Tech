<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Service;
use App\Models\Project;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\Faq;
use App\Models\Testimonial;
use App\Models\SiteSetting;
use Illuminate\Support\Str;

class InteriorSeeder extends Seeder
{
    public function run(): void
    {
        $jsonPath = database_path('data/scraped_data.json');
        if (!file_exists($jsonPath)) {
            $this->command->error("scraped_data.json not found!");
            return;
        }

        $data = json_decode(file_get_contents($jsonPath), true);

        // 1. Categories
        $projectCategories = [
            'Bedroom Interior Design Projects' => 'bedroom-interior-design-projects-bangladesh',
            'Master Bedroom Interior Design Projects' => 'master-bedroom-interior-design-projects-bangladesh',
            'Kids Bedroom Interior Design Projects' => 'kids-bedroom-interior-design-projects-bangladesh',
            'Guest Bedroom Interior Design Projects' => 'guest-bedroom-interior-design-projects-bangladesh',
            'Living Room Interior Design Projects' => 'living-room-interior-design-projects-bangladesh',
            'Dining Room Interior Design Projects' => 'dining-room-interior-design-projects-bangladesh',
            'Kitchen Interior Design Projects' => 'kitchen-interior-design-projects-bangladesh',
            'Modular Kitchen Design Projects' => 'modular-kitchen-projects-bangladesh',
            'Open Kitchen Design Projects' => 'open-kitchen-design-projects-bangladesh',
            'Common Area Interior Design Projects' => 'common-area-interior-design-projects-bangladesh',
            'Cabinet Design Projects' => 'cabinet-design-projects-bangladesh',
            'Luxury Interior Design Projects' => 'luxury-interior-design-projects',
            'Modern Interior Design Projects' => 'modern-interior-design-projects',
            'Closet Design Projects' => 'closet-design-projects-bangladesh',
        ];

        foreach ($projectCategories as $name => $slug) {
            Category::updateOrCreate(['slug' => $slug], [
                'name' => $name,
                'type' => 'project',
                'description' => "Explore {$name} in Bangladesh crafted by DIT Studio's award-winning architects and designers."
            ]);
        }

        // 2. Services
        $serviceIcons = [
            'custom-furniture-design' => 'fa-couch',
            'bedroom-design' => 'fa-bed',
            'common-space-design' => 'fa-shapes',
            'living-room-design' => 'fa-tv',
            'open-kitchen-design' => 'fa-utensils',
            'modular-kitchen-design' => 'fa-kitchen-set',
            'traditional-kitchen-design' => 'fa-fire-burner',
            'bathroom-design' => 'fa-bath',
            'landscape-design' => 'fa-tree',
            'home-interior-design' => 'fa-house-chimney'
        ];

        $processSteps = [
            ['step' => '01', 'title' => 'Initial Consultation', 'desc' => 'In-depth discussion of your lifestyle, aesthetic taste, functional needs, and budget.'],
            ['step' => '02', 'title' => 'Space Planning & 2D Layout', 'desc' => 'Comprehensive architectural measurements and ergonomic space utilization.'],
            ['step' => '03', 'title' => 'Photorealistic 3D Renderings', 'desc' => 'Full 360-degree visualization of materials, textures, lighting, and finishes.'],
            ['step' => '04', 'title' => 'Itemized BOQ & Material Selection', 'desc' => '100% transparent cost estimation without any hidden expenses.'],
            ['step' => '05', 'title' => 'In-House Factory Manufacturing', 'desc' => 'Precision joinery crafted at our West Badda workshop using German hardware.'],
            ['step' => '06', 'title' => 'On-Site Execution & Quality Control', 'desc' => 'Supervised civil, electrical, plumbing, false ceiling, and painting work.'],
            ['step' => '07', 'title' => 'Styling & Detailing', 'desc' => 'Curated illumination, soft furnishings, decor accents, and deep sanitization.'],
            ['step' => '08', 'title' => 'Formal Handover & Warranty', 'desc' => 'Punctual handover with comprehensive warranty and after-sales support.']
        ];

        foreach ($data['services'] ?? [] as $idx => $s) {
            $img = $s['local_image'] ?? $s['featured_image'] ?? null;
            $gallery = $s['local_gallery'] ?? $s['gallery'] ?? [];

            Service::updateOrCreate(['slug' => $s['slug']], [
                'title' => $s['title'],
                'icon' => $serviceIcons[$s['slug']] ?? 'fa-pencil-ruler',
                'excerpt' => Str::limit(strip_tags($s['description']), 160),
                'description' => $s['description'],
                'features' => [
                    'Tailored 100% to your lifestyle and space ergonomics',
                    'Premium grade imported boards, hardware & finishes',
                    'Direct in-house manufacturing in West Badda factory',
                    'Dedicated project manager and on-time handover warranty',
                    'Transparent itemized BOQ with zero hidden costs'
                ],
                'process_steps' => $processSteps,
                'featured_image' => $img,
                'gallery' => $gallery,
                'sort_order' => $idx + 1,
                'is_active' => true,
            ]);
        }

        // 3. Projects
        foreach ($data['projects'] ?? [] as $idx => $p) {
            $img = $p['local_image'] ?? $p['featured_image'] ?? null;
            $gallery = $p['local_gallery'] ?? $p['gallery'] ?? [];

            Project::updateOrCreate(['slug' => $p['slug']], [
                'title' => $p['title'],
                'category' => $p['category'] ?? 'Residential Interior',
                'location' => $p['location'] ?? 'Dhaka, Bangladesh',
                'area_sqft' => $p['sqft'] ?? '2,200 sq ft',
                'completion_year' => '2024 - 2025',
                'client_name' => 'Private Client',
                'budget_range' => 'Premium Full Turnkey',
                'description' => $p['description'] ?: "A bespoke {$p['category']} executed with exceptional craftsmanship by DIT Studio in {$p['location']}. Every detail from lighting, cabinetry, wall treatments to bespoke furniture was manufactured and installed in-house.",
                'featured_image' => $img,
                'gallery' => $gallery,
                'is_featured' => $idx < 6,
                'views_count' => rand(150, 1850),
            ]);
        }

        // 4. Products (Shop)
        foreach ($data['products'] ?? [] as $idx => $pr) {
            $img = $pr['local_image'] ?? $pr['image'] ?? null;
            // clean price digits
            $rawPrice = preg_replace('/[^0-9]/', '', $pr['price'] ?? '15000');
            $price = !empty($rawPrice) ? (float) $rawPrice : 15000.00;

            Product::updateOrCreate(['slug' => $pr['slug']], [
                'title' => $pr['title'],
                'category' => 'Custom Furniture',
                'price' => $price,
                'price_text' => $pr['price'] ?? '৳ 15,000',
                'sale_price' => $price > 20000 ? $price * 0.9 : null,
                'sku' => 'DIT-' . strtoupper(Str::random(5)),
                'stock_status' => 'in_stock',
                'short_description' => $pr['description'] ?? "High-end bespoke furniture built with commercial grade hardware.",
                'description' => ($pr['description'] ?? '') . "\n\nEach item is custom manufactured in our West Badda facility under rigorous architectural oversight. Available in custom dimensions, colors, and premium finishes upon request.",
                'image' => $img,
                'gallery' => $img ? [$img] : [],
                'dimensions' => 'Standard / Customizable',
                'material' => 'Gorjon Ply, Action TESA HDF / Marine Board, Blum Hardware',
                'is_featured' => true,
            ]);
        }

        // 5. Blog Posts
        foreach ($data['blogs'] ?? [] as $idx => $b) {
            $img = $b['local_image'] ?? $b['cover_image'] ?? null;

            BlogPost::updateOrCreate(['slug' => $b['slug']], [
                'title' => $b['title'],
                'author' => 'DIT Studio Editorial Team',
                'category' => 'Interior Design Insights',
                'excerpt' => $b['excerpt'] ?: Str::limit($b['content'], 180),
                'content' => $b['content'] ?: "Essential tips and architectural insights for home and office renovation in Bangladesh.",
                'cover_image' => $img,
                'reading_time' => (rand(4, 8)) . ' min read',
                'published_at' => now()->subDays($idx * 5),
            ]);
        }

        // 6. FAQs
        foreach ($data['faqs'] ?? [] as $idx => $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], [
                'answer' => $faq['answer'],
                'category' => ($idx < 10) ? 'About DIT Studio' : (($idx < 20) ? 'Services & Process' : 'Costs & Quality'),
                'sort_order' => $idx + 1,
            ]);
        }

        // 7. Testimonials
        $testimonials = [
            [
                'client_name' => 'Engr. Mahbubur Rahman',
                'client_title' => 'Homeowner, Gulshan 2',
                'location' => 'Gulshan 2, Dhaka',
                'rating' => 5,
                'project_name' => '3,200 sq ft Luxury Apartment',
                'comment' => 'DIT Studio delivered beyond our wildest expectations. Their in-house factory gave them full quality control, and the final handover was done right on the promised schedule. Their attention to lighting, modular kitchen, and custom closets is unmatched in Bangladesh.',
                'avatar' => 'images/client1.webp'
            ],
            [
                'client_name' => 'Dr. Nusrat Jahan',
                'client_title' => 'Homeowner, Uttara Sector 6',
                'location' => 'Uttara, Dhaka',
                'rating' => 5,
                'project_name' => '1,800 sq ft Modern Apartment',
                'comment' => 'Working with DIT Studio was seamless from day one. The 3D render was 100% faithful to the actual completed rooms. Every cabinet fit with millimeter precision and there were zero hidden charges in their BOQ.',
                'avatar' => 'images/client2.webp'
            ],
            [
                'client_name' => 'Kazi Tanvir Ahmed',
                'client_title' => 'Managing Director',
                'location' => 'Bashundhara R/A, Dhaka',
                'rating' => 5,
                'project_name' => 'Full Duplex Interior Design',
                'comment' => 'Truly the most professional interior design firm in Dhaka. We loved their 8-step transparent process and weekly site progress reports. Highly recommended to anyone looking for stress-free luxury interiors.',
                'avatar' => 'images/client3.webp'
            ]
        ];

        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(['client_name' => $t['client_name']], $t);
        }

        // 8. Site Settings
        $settings = [
            'site_name' => 'Triangle Interior Design',
            'tagline' => 'Best Interior Design Company in Bangladesh',
            'phone' => '+8801633033033',
            'phone_display' => '01633 033 033',
            'factory_phone' => '+8801611644811',
            'email' => 'info.ditbd@gmail.com',
            'factory_email' => 'factory.ditstudio@gmail.com',
            'office_address' => 'House 127 (2nd floor), Road 05, Mohakhali New DOHS, Dhaka 1206, Bangladesh',
            'factory_address' => '1920, Koborsthan Road, East Badda, Dhaka 1212, Bangladesh',
            'hours' => 'Saturday - Thursday: 9:00 AM - 6:00 PM (Friday Closed)',
            'facebook' => 'https://www.facebook.com/dit.interior/',
            'youtube' => 'https://www.youtube.com/channel/UCH_kEOE-o6hlo1X1DVermTQ',
            'whatsapp' => 'https://wa.me/8801633033033',
            'stats_projects' => '500+',
            'stats_years' => '15+',
            'stats_team' => '50+',
            'stats_satisfaction' => '100%',
            'logo' => 'images/triangle-logo.svg',
            'developer_name' => 'Engr Saad',
            'developer_url' => 'https://engr-saad.com'
        ];

        foreach ($settings as $k => $v) {
            SiteSetting::set($k, $v);
        }
    }
}
