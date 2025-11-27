<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorsController extends Controller
{
    public function index(){
        $colors = Color::all() ;
        return view('products.colors' , compact('colors'));
    }
}
