<?php

namespace App\Http\Controllers;

use App\Models\fs;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all() ;
        return view('products.productsListe' , compact('products')) ;
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required' , 
            'price' => 'required'
        ]) ;
        Product::create($validated) ;
        return redirect()->route('product.index') ;
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::findOrfail($id) ;
        return view('product.show' , compact('product')) ;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(fs $fs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, fs $fs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Product::destroy($id) ;
        return redirect()->route('product.index') ;
    }
}
