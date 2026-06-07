<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Section;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            'hero' => [
                [
                    'title'   => 'Premium Garment Manufacturing',
                    'excerpt' => 'We deliver world-class textile products to 40+ countries with unmatched quality standards.',
                    'button_text' => 'Explore Products',
                    'button_url'  => '/products',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Sustainable Textile Solutions',
                    'excerpt' => 'Eco-friendly production processes with ISO-certified factories.',
                    'button_text' => 'Learn More',
                    'button_url'  => '/about',
                    'order'  => 2,
                    'status' => 'published',
                ],
            ],
            'features' => [
                [
                    'title'   => 'ISO Certified Quality',
                    'excerpt' => 'Every product meets international quality benchmarks.',
                    'icon'    => 'fa-certificate',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Fast Turnaround',
                    'excerpt' => 'Reliable delivery schedules tailored to your supply chain needs.',
                    'icon'    => 'fa-shipping-fast',
                    'order'  => 2,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Custom Designs',
                    'excerpt' => 'Full OEM/ODM capabilities with dedicated R&D team.',
                    'icon'    => 'fa-paint-brush',
                    'order'  => 3,
                    'status' => 'published',
                ],
            ],
            'team' => [
                [
                    'title'   => 'Mr. Rahman Ali',
                    'excerpt' => 'CEO & Founder — 20 years in textile export industry.',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Ms. Fatema Khanam',
                    'excerpt' => 'Head of Production — quality assurance specialist.',
                    'order'  => 2,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Mr. Karim Hossain',
                    'excerpt' => 'Export Manager — handles international accounts.',
                    'order'  => 3,
                    'status' => 'published',
                ],
            ],
            'mission' => [
                [
                    'title'   => 'Our Mission',
                    'excerpt' => 'To be the most trusted garment exporter delivering quality, sustainability and partnership.',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Our Vision',
                    'excerpt' => 'Expanding global presence while maintaining ethical manufacturing practices.',
                    'order'  => 2,
                    'status' => 'published',
                ],
            ],
            'testimonials' => [
                [
                    'title'   => 'John Mitchell, USA',
                    'excerpt' => '"Outstanding quality and on-time delivery. Our preferred garment partner."',
                    'badge'   => '★★★★★',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Amelia Clarke, UK',
                    'excerpt' => '"Professional team, excellent communication throughout the order process."',
                    'badge'   => '★★★★★',
                    'order'  => 2,
                    'status' => 'published',
                ],
            ],
            'contact-form' => [
                [
                    'title'   => 'Get In Touch',
                    'excerpt' => 'We would love to hear from you. Send us a message and we will respond within 24 hours.',
                    'order'  => 1,
                    'status' => 'published',
                ],
            ],
            'faq' => [
                [
                    'title'   => 'What is your minimum order quantity?',
                    'excerpt' => 'Our MOQ is typically 500 pieces per style, though we negotiate for new clients.',
                    'order'  => 1,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Do you offer sample production?',
                    'excerpt' => 'Yes, samples are available within 7-10 business days.',
                    'order'  => 2,
                    'status' => 'published',
                ],
                [
                    'title'   => 'Which countries do you export to?',
                    'excerpt' => 'We export to Europe, USA, Canada, Australia and the Middle East.',
                    'order'  => 3,
                    'status' => 'published',
                ],
            ],
        ];

        foreach ($data as $identifier => $posts) {
            $section = Section::where('identifier', $identifier)->first();
            if (! $section) {
                continue;
            }

            foreach ($posts as $postData) {
                Post::firstOrCreate(
                    ['title' => $postData['title'], 'section_id' => $section->id],
                    array_merge($postData, ['section_id' => $section->id])
                );
            }
        }
    }
}
