<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'T-shirts',
                'description' => 'Découvrez notre collection de T-shirts modernes et confortables.',
            ],
            [
                'name' => 'Chemises',
                'description' => 'Des chemises élégantes pour un style moderne et professionnel.',
            ],
            [
                'name' => 'Pantalons',
                'description' => 'Une sélection de pantalons adaptés à tous les styles.',
            ],
            [
                'name' => 'Vestes',
                'description' => 'Des vestes modernes pour compléter votre look.',
            ],
            [
                'name' => 'Sweats',
                'description' => 'Des sweats confortables pour un style décontracté.',
            ],
            [
                'name' => 'Jeans',
                'description' => 'Des jeans classiques et modernes pour votre quotidien.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create([
                'name' => $category['name'],
                'slug' => Str::slug($category['name']),
                'description' => $category['description'],
            ]);
        }
    }
}
