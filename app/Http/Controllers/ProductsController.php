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
        ])->get();

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
        $request->validate([
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
        ]);

        try {
            $data = $request->only([
                'name',
                'description',
                'price',
                'stock',
                'brand_id',
                'category_id',
                'gender_id',
                'product_type_id'
            ]);

            $product = Product::create($data);

            if ($request->filled('sizes')) {
                $product->sizes()->sync($request->input('sizes'));
            }

            $colors = $request->input('colors', []);

            foreach ($colors as $colorData) {
                ProductColor::create([
                    'product_id' => $product->id,
                    'color_id'   => $colorData['color_id'],
                ]);
            }

            // Redirect to image upload page
            return redirect()->route('products.images', $product->id);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('status', 'error')
                ->with('message', 'Failed to add product: ' . $e->getMessage());
        }
    }

    public function imagesView($id)
    {
        $product = Product::with('productColors.color')->findOrFail($id);

        return view('products.images', compact('product'));
    }


    public function imagesStore(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        foreach ($request->colors as $colorData) {

            $productColor = ProductColor::findOrFail($colorData['product_color_id']);

            if (!empty($colorData['images'])) {
                foreach ($colorData['images'] as $index => $file) {

                    $path = $file->store(
                        "products/$id/colors/{$productColor->color_id}",
                        'public'
                    );

                    $productColor->images()->create([
                        'image_path' => $path,
                        'is_main' => $index === 0,
                    ]);
                }
            }
        }

        return redirect()->route('products.index')
            ->with('message', 'Images uploaded successfully!');
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
        // Get the product with related sizes and colors/images
        $product = Product::with(['sizes', 'productColors.images'])->findOrFail($id);

        // Get the lists needed for select inputs and checkboxes
        $brands = Brand::all();
        $categories = Category::all();
        $genders = Gender::all();
        $types = ProductType::all();
        $sizes = Size::all();
        $colors = Color::all();

        return view('products.edit', compact(
            'product',
            'brands',
            'categories',
            'genders',
            'types',
            'sizes',
            'colors'
        ));
    }



    /**
     * Update product + (optional) replace images.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Validation
        $validated = $request->validate([
            'name'        => 'required|string',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
            'brand_id'    => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'gender_id'   => 'required|exists:genders,id',
            'type_id'     => 'required|exists:product_types,id', // fix table name

            'sizes'           => 'array',
            'sizes.*'         => 'exists:sizes,id',

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

        // Sync sizes
        if ($request->sizes) {
            $product->sizes()->sync($request->sizes);
        }

        // Handle color images
        if ($request->hasFile('color_images')) {
            foreach ($request->file('color_images') as $colorId => $images) {

                // Get or create the productColor pivot
                $productColor = $product->productColors()->firstOrCreate([
                    'color_id' => $colorId
                ]);

                foreach ($images as $image) {
                    // Store the file in the 'public' disk
                    $path = $image->store("products/{$product->id}/colors/{$colorId}", 'public');

                    // Save the path in database
                    $productColor->images()->create([
                        'image_path' => $path
                    ]);
                }
            }
        }

        return redirect()->route('products.index')->with('message', 'Product updated successfully.');
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
        foreach ($product->productColors as $pc) {
            foreach ($pc->images as $img) {
                Storage::delete('public/' . $img->image_path);
            }
        }

        // Delete the product itself
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully!');
    }
}
