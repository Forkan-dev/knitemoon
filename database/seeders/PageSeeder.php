<?php

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    public function run(): void
    {
        $pages = [
            ['name' => 'Home',     'slug' => 'home',     'title' => 'Home — TextileExport Pro',     'status' => 'active', 'order' => 1],
            ['name' => 'About',    'slug' => 'about',    'title' => 'About Us — TextileExport Pro',  'status' => 'active', 'order' => 2],
            ['name' => 'Products', 'slug' => 'products', 'title' => 'Products — TextileExport Pro',  'status' => 'active', 'order' => 3],
            ['name' => 'Contact',  'slug' => 'contact',  'title' => 'Contact — TextileExport Pro',   'status' => 'active', 'order' => 4],
            ['name' => 'Gallery',  'slug' => 'gallery',  'title' => null,                            'status' => 'active', 'order' => 0],
            ['name' => 'Team',     'slug' => 'team',     'title' => null,                            'status' => 'active', 'order' => 0],
        ];

        foreach ($pages as $page) {
            Page::firstOrCreate(['slug' => $page['slug']], $page);
        }
    }
}
