<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        $product = Product::all() ;
        return view('products.index' , compact('procuct')) ;
    }

    public function create(){
        return view('products.create') ;
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required' , 
            'price' => 'required' ,
        ]);
        Product::create($validated) ;
        return redirect()->route('products.index') ;
    }

    public function show($id){
        $product = Product::findOrFail($id) ;
        return view('products.sohw' , compact('procudt') ) ;
    }

    public function edit($id){
        $product = Product::findORFail($id) ;
        return view('products.edit' , compact('product')) ;
    }

    public function update(Request $request , $id) {
        $product = Product::findOrFail($id) ;
        $validated = $request->validate([
            'name' => 'required' ,
            'price' => 'required'
        ]);
        $product->update($validated) ;
        return redirect()->route('products.index') ;

    }

    public function destroy($id){
        Product::destroy($id) ;
        return redirect()->route('products.inde') ;
    }

}
