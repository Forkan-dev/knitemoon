<?php

namespace Database\Seeders;

use App\Models\Page;
use App\Models\Section;
use Illuminate\Database\Seeder;

class PivotSeeder extends Seeder
{
    public function run(): void
    {
        $map = [
            'home'     => ['hero' => 1, 'features' => 2, 'testimonials' => 3],
            'about'    => ['hero' => 1, 'mission' => 2, 'team' => 3],
            'products' => ['features' => 1],
            'contact'  => ['contact-form' => 1, 'faq' => 2],
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
