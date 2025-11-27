@extends('Welcome')

@section('content')
<div class="container mx-auto p-6">
    <div class="flex flex-col md:flex-row gap-6">
        <!-- Product Images / Colors -->
        <div class="md:w-1/2">
            <!-- Main images container -->
            <div id="images-container" class="mb-4 flex flex-col gap-2">
                @if($product->productColors->count())
                    @foreach($product->productColors->first()->images as $image)
                        <img src="{{ asset('storage/' . $image->image_path) }}" alt="{{ $product->name }}" class="w-full rounded shadow main-image">
                    @endforeach
                @else
                    <img src="{{ asset('placeholder.jpg') }}" alt="{{ $product->name }}" class="w-full rounded shadow main-image">
                @endif
            </div>

           
        </div>

        <!-- Product Info -->
        <div class="md:w-1/2 flex flex-col gap-4">
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>
            <p class="text-gray-600">{{ $product->description }}</p>
            <p class="text-xl font-semibold mt-2">${{ $product->price }}</p>

            <div class="mt-4">
                <p><strong>Brand:</strong> {{ $product->brand->name ?? '-' }}</p>
                <p><strong>Category:</strong> {{ $product->category->name ?? '-' }}</p>
                <p><strong>Gender:</strong> {{ $product->gender->name ?? '-' }}</p>
                <p><strong>Type:</strong> {{ $product->type->name ?? '-' }}</p>
            </div>

            <div class="mt-4">
                <p class="font-semibold">Available Sizes:</p>
                <div class="flex gap-2 mt-1">
                    @foreach($product->sizes as $size)
                        <span class="px-3 py-1 border rounded">{{ $size->name }}</span>
                    @endforeach
                </div>
            </div>

             <!-- Color buttons -->
            <div class="flex gap-2 mt-2">
                @foreach($product->productColors as $color)
                    <button type="button" class="w-8 h-8 rounded-full border border-gray-300"
                        style="background-color: {{ $color->color->hex_code ?? '#000' }};"
                        onclick="showColorImages(@json($color->images))">
                    </button>
                @endforeach
            </div>
        </div>
    </div>
</div>

<script>
    function showColorImages(images) {
        const container = document.getElementById('images-container');
        container.innerHTML = ''; // clear current images

        if(images.length === 0){
            container.innerHTML = '<img src="{{ asset("placeholder.jpg") }}" class="w-full rounded shadow main-image">';
            return;
        }

        images.forEach(img => {
            const imageElement = document.createElement('img');
            imageElement.src = '/storage/' + img.image_path;
            imageElement.alt = 'Product Image';
            imageElement.classList.add('w-full', 'rounded', 'shadow', 'main-image');
            container.appendChild(imageElement);
        });
    }
</script>
@endsection
