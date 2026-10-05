<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreProductsRequests;
use App\Http\Requests\UpdateProductRequests;
use App\Http\Resources\ProductsResource;
use App\Models\Products;

class ProductsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductsResource::collection(Products::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductsRequests $request)
    {

        $product = Products::create($request->validated());
        return response()->json([
            'id' => $product->id,
            'message' => "Product added",
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Products $product)
    {
        return new ProductsResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequests $request, Products $product)
    {
        $product->update($request->all());
        return new ProductsResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return response()->json([
            "message" => "Product removed"
        ]);
    }
}
