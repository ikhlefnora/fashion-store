<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Category;


class ShopController extends Controller
{
    public function index(): Response
    {
        $products = Product::with('category')
            ->where('is_active', true)
            ->latest()
            ->get();

        $categories = Category::where('is_active', true)
    ->orderBy('name')
    ->get();

        return Inertia::render('Shop/Index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

   public function show(Product $product): Response
{
    abort_unless($product->is_active, 404);

    $product->load([
        'category',
        'variants.size',
        'variants.color',
    ]);

    return Inertia::render('Shop/Show', [
        'product' => $product,
    ]);
}
}
