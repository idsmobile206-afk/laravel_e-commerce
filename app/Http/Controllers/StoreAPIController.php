<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class StoreAPIController extends Controller
{
    public function index()
    {
        $products = Product::with([
            'sizes',
            'brand',
            'category',
            'gender',
            'type',
            'productColors.color',
            'productColors.images'
        ])->get();
        return response()->json($products);
    }

    public function show($id)
    {
        $product = Product::with([
            'sizes',
            'brand',
            'category',
            'gender',
            'type',
            'productColors.color',
            'productColors.images'
        ])->findOrFail($id);

        return response()->json($product);
    }

    // POST /api/data
    public function store(Request $request)
    {
        // implement create logic
    }

    // PUT/PATCH /api/data/{id}
    public function update(Request $request, $id)
    {
        // implement update logic
    }

    // DELETE /api/data/{id}
    public function destroy($id)
    {
        // implement delete logic
    }
}
