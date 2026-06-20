<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['name' => 'Latest Articles',   'identifier' => 'latest-articles',   'description' => 'Recent blog posts preview',       'status' => 'active'],
            ['name' => 'Contact Form',      'identifier' => 'contact-form',      'description' => 'Contact form and details',         'status' => 'active'],
            ['name' => 'FAQ',               'identifier' => 'faq',               'description' => 'Frequently asked questions',       'status' => 'active'],
            ['name' => 'Testimonials',      'identifier' => 'testimonials',      'description' => 'Client testimonials and reviews',  'status' => 'active'],
            ['name' => 'about hero',        'identifier' => 'about-hero',        'description' => null,                               'status' => 'active'],
            ['name' => 'Our Journey',       'identifier' => 'our-journey',       'description' => null,                               'status' => 'active'],
            ['name' => 'Mission',           'identifier' => 'mission',           'description' => null,                               'status' => 'active'],
            ['name' => 'Our Core Values',   'identifier' => 'our-core-values',   'description' => null,                               'status' => 'active'],
            ['name' => 'Gallery',           'identifier' => 'gallery',           'description' => 'show factory image',               'status' => 'active'],
            ['name' => 'Product',           'identifier' => 'product',           'description' => null,                               'status' => 'active'],
            ['name' => 'Team',              'identifier' => 'tea',               'description' => null,                               'status' => 'active'],
            ['name' => 'Logo',              'identifier' => 'home',              'description' => null,                               'status' => 'active'],
            ['name' => 'About Company',     'identifier' => 'about-company',     'description' => null,                               'status' => 'active'],
            ['name' => 'Factory Highlights', 'identifier' => 'factory-highlights', 'description' => null,                             'status' => 'active'],
        ];

        foreach ($sections as $section) {
            Section::firstOrCreate(['identifier' => $section['identifier']], $section);
        }
    }
}
