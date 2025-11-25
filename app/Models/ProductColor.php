<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductColor extends Pivot
{
    protected $table = 'product_colors';

    public function images()
    {
        return $this->hasMany(ProductColorImage::class, 'product_color_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }
}
