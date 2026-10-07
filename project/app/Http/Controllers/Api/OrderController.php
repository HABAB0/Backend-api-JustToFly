<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $order = Order::where('user_id', $user->id)->with('items.product')->get();
        return OrderResource::collection($order);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $price = 0;
        $cartItems = Cart::where('user_id', $user->id)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return response()->json([
                "code" => 422,
                "message" => "Cart is empty"
            ]);
        }

        foreach ($cartItems as $item) {
            $price += $item->product->price;
        }

        $order = Order::create([
            'user_id' => $user->id,
            'order_price' => $price,
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id
            ]);
        }

        Cart::where('user_id', $user->id)->delete();

        return response()->json([
            "order_id" => $order->id,
            "message" => "Order is processed"
        ]);

    }
}
