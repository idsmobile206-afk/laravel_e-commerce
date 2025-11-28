@extends('welcome')

@section('content')
    <div class="max-w-4xl mx-auto mt-10 bg-white shadow-lg rounded-lg p-8">

        <h2 class="text-2xl font-bold mb-6 text-gray-800">
            Add Images for Product: {{ $product->name }}
        </h2>

        <form action="{{ route('products.images.store', $product->id) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf

            @foreach ($product->productColors as $color)
                <h3 class="font-semibold text-lg mb-2">Color: {{ $color->color->name }}</h3>
                <input type="hidden" name="colors[{{ $loop->index }}][product_color_id]" value="{{ $color->id }}">
                <input type="file" name="colors[{{ $loop->index }}][images][]" multiple
                    class="w-full border border-gray-300 rounded-lg p-2">
            @endforeach


            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">
                Save Images
            </button>
        </form>

    </div>
@endsection
