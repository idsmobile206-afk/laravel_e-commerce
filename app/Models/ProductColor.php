<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    protected $table = 'product_colors';

    protected $fillable = [
        'product_id',
        'color_id'
    ];

    public function images()
    {
        return $this->hasMany(ProductColorImage::class, 'product_color_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
