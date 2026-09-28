<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\ProductVariant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'product_variant_id' => ['required', 'integer', 'exists:product_variants,id'],
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $variant = ProductVariant::with('product')
            ->where('is_active', true)
            ->findOrFail($validated['product_variant_id']);

        if ($variant->stock < $validated['quantity']) {
            return back()->withErrors([
                'quantity' => 'La quantité demandée dépasse le stock disponible.',
            ]);
        }

        $sessionId = $request->session()->getId();

        $cart = Cart::firstOrCreate([
            'session_id' => $sessionId,
        ]);

        $item = $cart->items()
            ->where('product_variant_id', $variant->id)
            ->first();

        if ($item) {
            $newQuantity = $item->quantity + $validated['quantity'];

            if ($newQuantity > $variant->stock) {
                return back()->withErrors([
                    'quantity' => 'La quantité totale dépasse le stock disponible.',
                ]);
            }

            $item->update([
                'quantity' => $newQuantity,
            ]);
        } else {
            $item = $cart->items()->create([
                'product_variant_id' => $variant->id,
                'quantity' => $validated['quantity'],
                'unit_price' => $variant->price ?? $variant->product->price,
            ]);
        }

        return back()->with('success', 'Produit ajouté au panier.');
    }
}
