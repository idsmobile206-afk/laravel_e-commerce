<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    //
     public $incrementing = true;

    protected $table = 'product_colors';
    
    public function images()
    {
        return $this->hasMany(ProductColorImage::class, 'product_color_id');
    }
}
