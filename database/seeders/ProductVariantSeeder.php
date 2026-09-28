<?php

namespace Database\Seeders;

use App\Models\Color;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\Size;
use Illuminate\Database\Seeder;

class ProductVariantSeeder extends Seeder
{
    public function run(): void
    {
        $product = Product::where('name', 'T-shirt Essential')->firstOrFail();

        $variants = [
            ['size' => 'S', 'color' => 'Noir', 'sku' => 'TS-ESS-BLK-S', 'stock' => 5],
            ['size' => 'M', 'color' => 'Noir', 'sku' => 'TS-ESS-BLK-M', 'stock' => 10],
            ['size' => 'L', 'color' => 'Noir', 'sku' => 'TS-ESS-BLK-L', 'stock' => 7],

            ['size' => 'S', 'color' => 'Blanc', 'sku' => 'TS-ESS-WHT-S', 'stock' => 4],
            ['size' => 'M', 'color' => 'Blanc', 'sku' => 'TS-ESS-WHT-M', 'stock' => 8],
            ['size' => 'L', 'color' => 'Blanc', 'sku' => 'TS-ESS-WHT-L', 'stock' => 6],

            ['size' => 'M', 'color' => 'Bleu', 'sku' => 'TS-ESS-BLU-M', 'stock' => 5],
            ['size' => 'L', 'color' => 'Bleu', 'sku' => 'TS-ESS-BLU-L', 'stock' => 3],
        ];

        foreach ($variants as $variant) {
            $size = Size::where('name', $variant['size'])->firstOrFail();
            $color = Color::where('name', $variant['color'])->firstOrFail();

            ProductVariant::create([
                'product_id' => $product->id,
                'size_id' => $size->id,
                'color_id' => $color->id,
                'sku' => $variant['sku'],
                'stock' => $variant['stock'],
                'is_active' => true,
            ]);
        }
    }
}
