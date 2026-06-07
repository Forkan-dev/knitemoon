<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            ['name' => 'Hero',             'identifier' => 'hero',             'description' => 'Top hero banner with headline and CTA', 'status' => 'active'],
            ['name' => 'Features',         'identifier' => 'features',         'description' => 'Key product features or service highlights', 'status' => 'active'],
            ['name' => 'Team',             'identifier' => 'team',             'description' => 'Meet the team section', 'status' => 'active'],
            ['name' => 'Mission',          'identifier' => 'mission',          'description' => 'Company mission and values', 'status' => 'active'],
            ['name' => 'Latest Articles',  'identifier' => 'latest-articles',  'description' => 'Recent blog posts preview', 'status' => 'active'],
            ['name' => 'Contact Form',     'identifier' => 'contact-form',     'description' => 'Contact form and details', 'status' => 'active'],
            ['name' => 'FAQ',              'identifier' => 'faq',              'description' => 'Frequently asked questions', 'status' => 'active'],
            ['name' => 'Testimonials',     'identifier' => 'testimonials',     'description' => 'Client testimonials and reviews', 'status' => 'active'],
        ];

        foreach ($sections as $section) {
            Section::firstOrCreate(['identifier' => $section['identifier']], $section);
        }
    }
}
