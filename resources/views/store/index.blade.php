<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Grid</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body class="bg-gray-300">
    @include('store.navbar')
    
   <div class="flex justify-between items-center px-20 mt-10 py-4">
       
    <!-- Left Filters -->
    <div class="grid grid-cols-4 gap-4">
        <button class="px-4 py-2 bg-white rounded-3xl text-left font-semibold hover:bg-gray-100 transition shadow-sm border">
            <p class="text-gray-500 font-normal text-sm leading-tight">Category</p>
            <span class="flex items-center gap-1">
                All categories 
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </button>

        <button class="px-4 py-2 bg-white rounded-3xl text-left font-semibold hover:bg-gray-100 transition shadow-sm border">
            <p class="text-gray-500 font-normal text-sm leading-tight">Colors</p>
            <span class="flex items-center gap-1">
                All Colors  
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </button>

        <button class="px-4 py-2 bg-white rounded-3xl text-left font-semibold hover:bg-gray-100 transition shadow-sm border">
            <p class="text-gray-500 font-normal text-sm leading-tight">Features</p>
            <span class="flex items-center gap-1">
                All features 
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </button>

        <button class="px-4 py-2 bg-white rounded-3xl text-left font-semibold hover:bg-gray-100 transition shadow-sm border">
            <p class="text-gray-500 font-normal text-sm leading-tight">Price</p>
            <span class="flex items-center gap-1">
                From 0$ to 1000$
                <i class="fa-solid fa-caret-down"></i>
            </span>
        </button>
    </div>

    <!-- Right Sort Button -->
    <button class="px-5 py-2 bg-white rounded-3xl text-left font-semibold hover:bg-gray-100 transition shadow-sm border">
        <p class="text-gray-500 font-normal text-sm leading-tight">Sort</p>
        <span class="flex items-center gap-1">
            New in 
            <i class="fa-solid fa-caret-down"></i>
        </span>
    </button>

</div>


    <!-- Products Grid -->
    <div class="grid grid-cols-4 gap-6 px-20 py-10">
        @foreach ($products as $p)
            <div class=" block rounded-lg overflow-hidden hover:shadow-xl transition">
                <div href="#" class="w-full h-80 bg-black-900 flex justify-center">  
                    <img class="w-full h-80 " src="{{ $p->image }}" alt="{{ $p->name }}">
                </div>
                <div class="p-4">
                    <a href="#">
                        <h5 class="mt-2 mb-2 text-xl font-semibold tracking-tight text-gray-900">{{ $p->name }}</h5>
                    </a>
                    <p class="mb-2 text-gray-700 text-sm">Lorem ipsum dolor sit amet.</p>
                    <p class="mb-4 font-bold text-gray-900">{{ $p->price }} $</p>
                    <a href="#" class="inline-flex items-center text-sm font-medium text-gray-800 bg-gray-200 hover:bg-gray-300 rounded-md px-4 py-2 transition">
                        More details
                        <svg class="w-4 h-4 ms-1.5 ml-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
