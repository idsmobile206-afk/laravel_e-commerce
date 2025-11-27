<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductType;
use App\Models\Size;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with([
            'sizes',
            'brand',
            'category',
            'gender',
            'type',
            'productColors.color',
            'productColors.images'
        ])
            ->limit(10)
            ->get();

        return view('products.index', compact('products'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        $genders = Gender::all();
        $types = ProductType::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.create', compact('brands', 'categories', 'genders', 'types', 'sizes', 'colors'));
    }


    /**
     * Store a newly created product with attributes & images.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'brand_id' => 'nullable|exists:brands,id',
            'category_id' => 'nullable|exists:categories,id',
            'gender_id' => 'nullable|exists:genders,id',
            'product_type_id' => 'nullable|exists:product_types,id',
            'sizes' => 'nullable|array',
            'sizes.*' => 'exists:sizes,id',
            'colors' => 'nullable|array',
            'colors.*.color_id' => 'required|exists:colors,id',
            'colors.*.images.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:5120', // 5MB
        ]);

        // Create product
        $product = Product::create($validated);

        // Attach sizes
        if (!empty($request->sizes)) {
            $product->sizes()->sync($request->sizes);
        }

        // Handle colors and images
        if (!empty($request->colors)) {
            foreach ($request->colors as $colorData) {
                $colorId = $colorData['color_id'];

                // Create productColor pivot record
                $productColor = ProductColor::create([
                    'product_id' => $product->id,
                    'color_id' => $colorId,
                ]);

                // Upload images for this color
                if (!empty($colorData['images'])) {
                    foreach ($colorData['images'] as $index => $img) {
                        $path = $img->store("products/{$product->id}/colors/{$colorId}", 'public');

                        $productColor->images()->create([
                            'image_path' => $path,
                            'is_main' => $index === 0, // first image is main
                        ]);
                    }
                }
            }
        }

        return redirect()->route('products.index')->with('success', 'Product added successfully!');
    }






    /**
     * Display a single product.
     */
    public function show($id)
    {
        $product = Product::with([
            'sizes',
            'brand',
            'category',
            'gender',
            'type',
            'productColors.color',
            'productColors.images'
        ])->findOrFail($id);

        return view('products.show', compact('product'));
    }


    /**
     * Show product edit form.
     */
    public function edit($id)
    {
        $product = Product::with([
            'sizes',
            'productColors.color',
            'productColors.images'
        ])->findOrFail($id);

        return view('products.edit', compact('product'));
    }


    /**
     * Update product + (optional) replace images.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'brand_id'    => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'gender_id'   => 'required|exists:genders,id',
            'type_id'     => 'required|exists:types,id',

            'sizes'       => 'array',
            'sizes.*'     => 'exists:sizes,id',

            'color_images'       => 'array',
            'color_images.*'     => 'array',
            'color_images.*.*'   => 'image|max:4096',
        ]);

        // Update main product fields
        $product->update([
            'name'        => $request->name,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'brand_id'    => $request->brand_id,
            'category_id' => $request->category_id,
            'gender_id'   => $request->gender_id,
            'type_id'     => $request->type_id,
        ]);

        // Update sizes
        if ($request->sizes) {
            $product->sizes()->sync($request->sizes);
        }

        // (optional) Add new images
        if ($request->color_images) {
            foreach ($request->color_images as $colorId => $images) {
                $productColor = $product->productColors()->where('color_id', $colorId)->first();

                // Ensure pivot exists
                if (!$productColor) {
                    $productColor = $product->productColors()->create([
                        'color_id' => $colorId
                    ]);
                }

                foreach ($images as $image) {
                    $path = $image->store(
                        "public/products/{$product->id}/colors/{$colorId}"
                    );

                    $clean = str_replace("public/", "", $path);

                    $productColor->images()->create([
                        'image_path' => $clean
                    ]);
                }
            }
        }

        return redirect()->route('products.index');
    }


    /**
     * Delete a product + all its color images.
     */
    public function destroy($id)
    {
        $product = \App\Models\Product::findOrFail($id);

        // Detach sizes (many-to-many)
        $product->sizes()->detach();

        // Delete pivot productColors entries
        $product->productColors()->delete();

        // Optionally delete related images from storage if needed
        // foreach ($product->productColors as $pc) {
        //     foreach ($pc->images as $img) {
        //         Storage::delete('public/' . $img->image_path);
        //     }
        // }

        // Delete the product itself
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
