<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'admin@textileexport.com'],
            [
                'name'     => 'Admin',
                'email'    => 'admin@textileexport.com',
                'password' => bcrypt('password'),
            ]
        );

        $this->call([
            PageSeeder::class,
            SectionSeeder::class,
            PivotSeeder::class,
            PostSeeder::class,
        ]);
    }
}
