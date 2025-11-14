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

        .product-card:hover {
            border-color: var(--main-orange);
            box-shadow: 0 6px 20px rgba(255, 140, 0, 0.25);
            transform: translateY(-3px);
        }

        /* CTA button */
        .btn-orange {
            /* background: var(--main-orange); */
            color: var(--main-orange);
        }

        .btn-orange:hover {
            background: #e67a00;
            color : white ;
        }

        /* Optional: title hover underline */
        .product-card h5:hover {
            color: var(--main-orange);
        }
    </style>

</head>

<body class="bg-gray-300">

    @include('store.navbar')

    <div class="flex justify-between items-center px-20 mt-10 py-4">

        <!-- Left Filters -->
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
        </button>

    </div>

    <!-- Products Grid -->
    <div class="grid grid-cols-4 gap-6 px-20 py-10">
        @foreach ($products as $p)
            <div class="product-card block rounded-lg overflow-hidden ">
                <div class="w-full h-80  flex justify-center">
                    <img class="w-full h-80 object-cover" src="{{ $p->image }}" alt="{{ $p->name }}">
                </div>
                <div class="p-4">
                    <a href="#">
                        <h5 class="mt-2 mb-2 text-xl font-semibold tracking-tight">{{ $p->name }}</h5>
                    </a>
                    <p class="mb-2 text-gray-700 text-sm">Lorem ipsum dolor sit amet.</p>
                    <p class="mb-4 font-bold text-gray-900">{{ $p->price }} $</p>
                    <a href="#"
                        class="btn-orange inline-flex items-center text-sm font-medium rounded-md px-4 py-2 transition">
                        More details
                        <svg class="w-4 h-4 ms-1.5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 12H5m14 0-4 4m4-4-4-4" />
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</body>

</html>
