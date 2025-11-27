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
            'brand' ,
            'category',
            'gender' ,
            'type' ,
            'productColors.color',
            'productColors.images'
        ])->limit(10)->get();
        return response()->json($products) ;
    }
}
