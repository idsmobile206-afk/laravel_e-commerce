<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index(){
        $brands = Brand::all() ;
        return view('brands.index' , compact('brands')) ;
    }

    public function create(){
        return view('brands.create') ;
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required' ,
            'slug' => 'required' ,
            'description' => 'required' ,
            'logo_path' => 'required' ,
        ]);
        Brand::create($validated) ;
        return redirect()->route('brands.index') ;
    }

    public function show($id){
        $brand = Brand::findOrFail($id) ;
        return view('brands.show' , compact('brand')) ;
    }

    public function edit($id){
        $brand = Brand::findOrFail($id) ;
        return view('brands.edit' , compact('brand')) ;
    }

    public function update($request , $id){
        $brand = Brand::findOrFail($id) ;
        $validated = $request->validate([
            'name' => 'required' ,
            'slug' => 'required' ,
            'description' => 'required' ,
            'logo_path' => 'required' ,
        ]) ;
        $brand->update($validated) ;
        return redirect()->route('brands.index') ;

    }

    public function destroy($id){
        Brand::destroy($id) ;
        return redirect()->route('brands.index') ;
    }
}
