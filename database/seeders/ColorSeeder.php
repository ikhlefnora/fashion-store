<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ColorSeeder extends Seeder
{
    public function run(): void
    {
        $colors = [
            [
                'name' => 'Noir',
                'hex_code' => '#000000',
            ],
            [
                'name' => 'Blanc',
                'hex_code' => '#FFFFFF',
            ],
            [
                'name' => 'Rouge',
                'hex_code' => '#EF4444',
            ],
            [
                'name' => 'Bleu',
                'hex_code' => '#3B82F6',
            ],
            [
                'name' => 'Vert',
                'hex_code' => '#22C55E',
            ],
            [
                'name' => 'Beige',
                'hex_code' => '#D6C2A1',
            ],
        ];

        foreach ($colors as $color) {
            Color::create([
                'name' => $color['name'],
                'slug' => Str::slug($color['name']),
                'hex_code' => $color['hex_code'],
            ]);
        }
    }
}
