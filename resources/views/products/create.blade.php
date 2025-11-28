@extends('welcome')

@section('content')
<div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">

    <h2 class="text-2xl font-bold mb-6 text-gray-800">Create Product</h2>

    @if ($errors->any())
        <div class="mb-6 bg-red-100 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc ml-6">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="space-y-6">
        @csrf

        <!-- NAME -->
        <div>
            <label class="block font-semibold mb-2 text-gray-700">Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- DESCRIPTION -->
        <div>
            <label class="block font-semibold mb-2 text-gray-700">Description</label>
            <textarea name="description" rows="3"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">{{ old('description') }}</textarea>
        </div>

        <!-- PRICE -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- STOCK -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Stock</label>
            <input type="number" name="stock" value="{{ old('stock') }}"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-300">
        </div>

        <!-- BRAND -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Brand</label>
            <select name="brand_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <option value="">Select Brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- CATEGORY -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Category</label>
            <select name="category_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <option value="">Select Category</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- GENDER -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Gender</label>
            <select name="gender_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <option value="">Select Gender</option>
                @foreach ($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- PRODUCT TYPE -->
        <div>
            <label class="block font-semibold text-gray-700 mb-2">Product Type</label>
            <select name="product_type_id"
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white">
                <option value="">Select Type</option>
                @foreach ($types as $pt)
                    <option value="{{ $pt->id }}">{{ $pt->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- SIZES (ARRAY) -->
        <div>
            <label class="block font-semibold mb-2 text-gray-700">Sizes</label>
            <select name="sizes[]" multiple
                class="w-full border border-gray-300 rounded-lg px-4 py-2 bg-white h-40">
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->name }}</option>
                @endforeach
            </select>
            <p class="text-sm text-gray-500">Select multiple if needed.</p>
        </div>

        <!-- COLORS (ARRAY OF OBJECTS WITHOUT IMAGES) -->
        <div>
            <label class="block font-semibold mb-2 text-gray-700">Colors</label>

            <div class="space-y-3">
                @foreach ($colors as $color)
                    <label class="flex items-center gap-2">
                        <input type="checkbox"
                               name="colors[{{ $loop->index }}][color_id]"
                               value="{{ $color->id }}"
                               class="w-4 h-4 border-gray-300">
                        <span>{{ $color->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        <!-- SUBMIT -->
        <div class="pt-4">
            <button type="submit"
                class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
                Save Product
            </button>
        </div>

    </form>
</div>
@endsection
