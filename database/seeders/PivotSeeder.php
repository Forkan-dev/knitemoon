<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    public function run(): void
    {
        // page slug => [section identifier => order]
        $map = [
            'home' => [
                'home'               => 0, // Logo
                'about-hero'         => 1,
                'product'            => 2,
                'testimonials'       => 3,
                'about-company'      => 4,
                'factory-highlights' => 5,
                'gallery'            => 6,
            ],
            'about' => [
                'about-hero'      => 1,
                'our-journey'     => 2,
                'mission'         => 3,
                'our-core-values' => 4,
                'contact-form'    => 5,
            ],
            'products' => [
                'product' => 0,
            ],
            'contact' => [
                'contact-form' => 1,
                'faq'          => 2,
            ],
            'gallery' => [
                'gallery' => 0,
            ],
            'team' => [
                'tea' => 0,
            ],
        ];

        foreach ($map as $pageSlug => $sectionOrders) {
            $page = Page::where('slug', $pageSlug)->first();
            if (! $page) {
                continue;
            }

            foreach ($sectionOrders as $identifier => $order) {
                $section = Section::where('identifier', $identifier)->first();
                if (! $section) {
                    continue;
                }

                $page->sections()->syncWithoutDetaching([
                    $section->id => ['order' => $order],
                ]);
            }
        }
    }
}
