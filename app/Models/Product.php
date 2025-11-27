<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock' ,
        'brand_id',
        'category_id',
        'gender_id',
        'product_type_id'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    // Colors (simple many-to-many)
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors');
    }

    // Sizes (many-to-many)
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

    // ProductColor model (real table, real ID)
    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
}
