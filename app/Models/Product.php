<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price',
        'brand_id', 'category_id', 'gender_id', 'product_type_id'
    ];

    public function brand()    { return $this->belongsTo(Brand::class); }
    public function category() { return $this->belongsTo(Category::class); }
    public function gender()   { return $this->belongsTo(Gender::class); }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    // Colors (many-to-many)
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'product_colors')
                    ->using(ProductColor::class)
                    ->withTimestamps()
                    ->withPivot('id');  // required to access pivot model ID
    }

    // Sizes (many-to-many)
    public function sizes()
    {
        return $this->belongsToMany(Size::class, 'product_sizes');
    }

    // ProductColor pivot model (needed for images!)
    public function productColors()
    {
        return $this->hasMany(ProductColor::class);
    }
}
