<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'category' => 'T-shirts',
                'name' => 'T-shirt Essential',
                'description' => 'T-shirt moderne et confortable, idéal pour un look quotidien.',
                'price' => 2500,
                'badge' => 'Nouveau',
                'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category' => 'Chemises',
                'name' => 'Chemise Oxford',
                'description' => 'Chemise élégante adaptée aux occasions professionnelles et décontractées.',
                'price' => 4500,
                'badge' => 'Populaire',
                'image' => 'https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category' => 'Pantalons',
                'name' => 'Pantalon Casual',
                'description' => 'Pantalon confortable avec une coupe moderne.',
                'price' => 5500,
                'badge' => null,
                'image' => 'https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category' => 'Vestes',
                'name' => 'Veste Minimal',
                'description' => 'Veste moderne au design minimaliste.',
                'price' => 8500,
                'badge' => 'Nouveau',
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category' => 'Sweats',
                'name' => 'Sweat Premium',
                'description' => 'Sweat confortable et élégant pour un style décontracté.',
                'price' => 6500,
                'badge' => null,
                'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'category' => 'Jeans',
                'name' => 'Jean Classic',
                'description' => 'Jean classique facile à associer avec différentes tenues.',
                'price' => 6000,
                'badge' => null,
                'image' => 'https://images.unsplash.com/photo-1542272604-787c3835535d?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($products as $product) {
            $category = Category::where('name', $product['category'])->firstOrFail();

            Product::create([
                'category_id' => $category->id,
                'name' => $product['name'],
                'slug' => Str::slug($product['name']),
                'description' => $product['description'],
                'price' => $product['price'],
                'image' => $product['image'],
            ]);
        }
    }
}
