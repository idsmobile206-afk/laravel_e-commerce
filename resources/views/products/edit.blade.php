@extends('welcome')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded shadow">
    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Product Name --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" 
                   class="w-full border rounded px-3 py-2">
            @error('name') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Price --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="price">Price</label>
            <input type="number" step="0.01" name="price" id="price" value="{{ old('price', $product->price) }}" 
                   class="w-full border rounded px-3 py-2">
            @error('price') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Stock --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="stock">Stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" 
                   class="w-full border rounded px-3 py-2">
            @error('stock') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Brand --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="w-full border rounded px-3 py-2">
                @foreach($brands as $brand)
                    <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Category --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="category_id">Category</label>
            <select name="category_id" id="category_id" class="w-full border rounded px-3 py-2">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Gender --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="gender_id">Gender</label>
            <select name="gender_id" id="gender_id" class="w-full border rounded px-3 py-2">
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}" {{ $product->gender_id == $gender->id ? 'selected' : '' }}>
                        {{ $gender->name }}
                    </option>
                @endforeach
            </select>
            @error('gender_id') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Type --}}
        <div class="mb-4">
            <label class="block font-medium mb-1" for="type_id">Type</label>
            <select name="type_id" id="type_id" class="w-full border rounded px-3 py-2">
                @foreach($types as $type)
                    <option value="{{ $type->id }}" {{ $product->type_id == $type->id ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                @endforeach
            </select>
            @error('type_id') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Sizes --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Sizes</label>
            <div class="flex gap-3 flex-wrap">
                @foreach($sizes as $size)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}"
                            {{ in_array($size->id, old('sizes', $product->sizes->pluck('id')->toArray())) ? 'checked' : '' }}
                            class="mr-2">
                        {{ $size->name }}
                    </label>
                @endforeach
            </div>
            @error('sizes') <p class="text-red-500">{{ $message }}</p> @enderror
        </div>

        {{-- Color Images --}}
        <div class="mb-6">
            <label class="block font-medium mb-2">Colors & Images</label>
            @foreach($colors as $color)
                <div class="mb-4 border p-3 rounded">
                    <h3 class="font-semibold mb-2">{{ $color->name }}</h3>

                    {{-- Existing Images --}}
                    <div class="flex gap-3 mb-2 flex-wrap">
                        @foreach($product->productColors->where('color_id', $color->id)->first()?->images ?? [] as $image)
                            <div class="relative">
                                <img src="{{ asset('storage/' . $image->image_path) }}" class="w-20 h-20 object-cover rounded">
                            </div>
                        @endforeach
                    </div>

                    {{-- Upload New Images --}}
                    <input type="file" name="color_images[{{ $color->id }}][]" multiple class="w-full">
                    @error("color_images.$color->id") <p class="text-red-500">{{ $message }}</p> @enderror
                </div>
            @endforeach
        </div>

        <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Update Product
        </button>
    </form>
</div>
@endsection
