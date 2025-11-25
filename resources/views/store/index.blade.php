<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        /* Black + Orange Theme */
        :root {
            --main-black: #111;
            --main-orange: #ff8c00;
        }

        /* Filters / Sort Buttons */
        .filter-btn {
            background: white;
            border: 1px solid #ddd;
            border-radius: 1.5rem;
            transition: 0.25s ease;
        }

        .filter-btn:hover {
            border-color: var(--main-orange);
            box-shadow: 0 4px 12px rgba(255, 140, 0, 0.15);
        }

        .filter-btn span i {
            color: var(--main-orange);
        }

        /* Product cards */
        .product-card {

            transition: 0.3s ease;
        }
    </style>

</head>

<body class="bg-gray-300">

    @include('store.navbar')

    <div class="flex justify-between items-center px-20 mt-10 py-4">

        {{-- <!-- Left Filters -->
        <div class="grid grid-cols-4 gap-4">
            <button class="filter-btn px-4 py-2 text-left font-semibold">
                <p class="text-gray-500 text-sm leading-tight">Category</p>
                <span class="flex items-center gap-1">
                    All categories
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </button>

            <button class="filter-btn px-4 py-2 text-left font-semibold">
                <p class="text-gray-500 text-sm leading-tight">Colors</p>
                <span class="flex items-center gap-1">
                    All Colors
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </button>

            <button class="filter-btn px-4 py-2 text-left font-semibold">
                <p class="text-gray-500 text-sm leading-tight">Features</p>
                <span class="flex items-center gap-1">
                    All features
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </button>

            <button class="filter-btn px-4 py-2 text-left font-semibold">
                <p class="text-gray-500 text-sm leading-tight">Price</p>
                <span class="flex items-center gap-1">
                    From 0$ to 1000$
                    <i class="fa-solid fa-caret-down"></i>
                </span>
            </button>
        </div>

        <!-- Right Sort Button -->
        <button class="filter-btn px-5 py-2 text-left font-semibold">
            <p class="text-gray-500 text-sm leading-tight">Sort</p>
            <span class="flex items-center gap-1">
                New in
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </button> --}}

    </div>

    <div class="grid grid-cols-4 gap-6 px-20 py-10">
    @foreach ($products as $p)
        <div class="product-card block rounded-lg overflow-hidden relative">

            <!-- Icons -->
            <div class="absolute top-3 right-3 flex space-x-3 z-10">
                <!-- Wishlist -->
                <button class="p-2 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        class="w-5 h-5 text-red-500">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 016.364 0L12 7.636l1.318-1.318a4.5
                              4.5 0 116.364 6.364L12 21.364l-7.682-7.682a4.5
                              4.5 0 010-6.364z" />
                    </svg>
                </button>

                <!-- Add to Cart -->
                <button class="transition">
                    <i class="fa-solid text-[#ff6a00] hover:text-[#ff6a01] fa-cart-arrow-down"></i>
                </button>
            </div>

            <!-- Image -->
            <div class="w-full h-80 flex justify-center">
                @if($p->productColors->count())
                    @php
                        $mainImage = $p->productColors->first()->images->firstWhere('is_main', true);
                        if (!$mainImage) {
                            $mainImage = $p->productColors->first()->images->first();
                        }
                    @endphp
                    <img class="w-full h-80 object-cover" src="{{ $mainImage->image_path ?? 'placeholder.jpg' }}" alt="{{ $p->name }}">
                @else
                    <img class="w-full h-80 object-cover" src="placeholder.jpg" alt="{{ $p->name }}">
                @endif
            </div>

            <!-- Sizes -->
            <div class="bg-white p-1 flex space-x-1">
                @foreach ($p->sizes as $size)
                    <span class="px-2 py-1 border rounded">{{ $size->name }}</span>
                @endforeach
            </div>

            <!-- Colors -->
            <div class="flex space-x-1 mt-1">
                @foreach ($p->productColors as $pc)
                    <span style="background-color: {{ $pc->color->hex_code }}; width:20px; height:20px; display:inline-block; border-radius:50%;"></span>
                @endforeach
            </div>

            <!-- Content -->
            <div class="p-4">
                <a href="#">
                    <h5 class="mt-2 mb-2 text-xl font-semibold tracking-tight">{{ $p->brand->name }}</h5>
                    <h5 class="mt-2 mb-2 text-xl font-semibold tracking-tight">{{ $p->name }}</h5>
                </a>
                <p class="mb-2 text-gray-700 text-sm">
                    {{ \Illuminate\Support\Str::words($p->description, 10, ' ...') }}
                </p>
                <p class="mb-4 font-bold text-gray-900">{{ $p->price }} $</p>
            </div>

        </div>
    @endforeach
</div>


    </div>

</body>

</html>
