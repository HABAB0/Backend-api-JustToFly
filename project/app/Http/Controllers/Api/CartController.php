<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        $cart = Cart::where('user_id', $user->id)->with('product')->get();

        return CartResource::collection($cart);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Product $product)
    {
        $userId = $request->user()->id;

        Cart::create([
            'user_id'    => $userId,
            'product_id' => $product->id,
        ]);

        return response()->json([
            'message' => 'Product add to cart'
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        if($cart->user_id !== request()->user()->id) {
            return response()->json([
                'message' => 'Forbidden for you'
            ], 403);
        }
        $cart->delete();

        return response()->json([
            'message' => 'Item removed from cart'
        ], 201);
    }
}
