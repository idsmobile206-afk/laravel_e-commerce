@extends('welcome')

@section('content')
@if(session('message'))
    <div class="mb-6 px-4 py-3 rounded 
        {{ session('status') == 'success' ? 'bg-green-100 border border-green-400 text-green-700' : '' }}
        {{ session('status') == 'error' ? 'bg-red-100 border border-red-400 text-red-700' : '' }}">
        {{ session('message') }}
    </div>
@endif

<div class="max-w-4xl mx-auto py-10 px-6">
    <h1 class="text-3xl font-bold text-purple-600 mb-8 text-center">Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-8 space-y-6">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block mb-2 font-semibold">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400" />
        </div>

        {{-- Description --}}
        <div>
            <label class="block mb-2 font-semibold">Description</label>
            <textarea name="description" rows="4"
                class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400">{{ old('description') }}</textarea>
        </div>

        {{-- Price / Stock --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold">Price (DH)</label>
                <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400" />
            </div>

            <div>
                <label class="block mb-2 font-semibold">Stock</label>
                <input type="number" name="stock" value="{{ old('stock') }}"
                    class="w-full px-4 py-2 border rounded focus:outline-none focus:ring-2 focus:ring-purple-400" />
            </div>
        </div>

        {{-- Brand / Category / Gender / Type --}}
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block mb-2 font-semibold">Brand</label>
                <select name="brand_id" class="w-full px-4 py-2 border rounded">
                    <option value="">Select Brand</option>
                    @foreach ($brands as $brand)
                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Category</label>
                <select name="category_id" class="w-full px-4 py-2 border rounded">
                    <option value="">Select Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Gender</label>
                <select name="gender_id" class="w-full px-4 py-2 border rounded">
                    <option value="">Select Gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{ $gender->id }}">{{ $gender->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-2 font-semibold">Type</label>
                <select name="product_type_id" class="w-full px-4 py-2 border rounded">
                    <option value="">Select Type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Sizes --}}
        <div>
            <label class="block mb-2 font-semibold">Sizes</label>
            <div class="flex flex-wrap gap-2">
                @foreach ($sizes as $size)
                    <label class="inline-flex items-center gap-2 border rounded px-3 py-1 cursor-pointer">
                        <input type="checkbox" name="sizes[]" value="{{ $size->id }}" />
                        <span>{{ $size->name }}</span>
                    </label>
                @endforeach
            </div>
        </div>

        {{-- Colors & Images --}}
        <div>
            <label class="block mb-2 font-semibold">Colors & Images</label>
            <div id="colorsContainer" class="flex flex-col gap-4"></div>

            <button type="button" id="addColorBtn"
                class="bg-purple-600 text-white px-4 py-2 rounded hover:bg-purple-700 mt-2">
                + Add Color
            </button>
        </div>

        {{-- Submit --}}
        <div class="text-right">
            <button type="submit"
                class="bg-purple-600 text-white px-6 py-2 rounded hover:bg-purple-700">
                Add Product
            </button>
        </div>

    </form>
</div>

{{-- JS --}}
<script>
    const colors = @json($colors);

    let colorIndex = 0;
    const container = document.getElementById('colorsContainer');
    const addBtn = document.getElementById('addColorBtn');

    addBtn.addEventListener('click', () => {
        const block = document.createElement('div');
        block.classList.add('p-4', 'border', 'rounded', 'space-y-3', 'bg-gray-50');

        block.innerHTML = `
            <div class="flex items-center gap-3">
                <select name="colors[${colorIndex}][color_id]"
                    class="border px-3 py-1 rounded w-48" required>
                    <option value="">Select Color</option>
                    ${colors.map(c => `<option value="${c.id}">${c.name}</option>`).join('')}
                </select>

                <button type="button"
                    class="removeColor bg-red-500 text-white px-3 py-1 rounded">
                    Remove Color
                </button>
            </div>

            <div class="imagesContainer space-y-2"></div>

            <button type="button"
                class="addImage bg-purple-600 text-white px-3 py-1 rounded">
                + Add Image
            </button>
        `;

        const imagesContainer = block.querySelector(".imagesContainer");
        const addImageBtn = block.querySelector(".addImage");

        // First image input
        addImageInput(imagesContainer, colorIndex);

        // Add more image inputs
        addImageBtn.addEventListener("click", () => {
            addImageInput(imagesContainer, colorIndex);
        });

        // Remove color
        block.querySelector('.removeColor').addEventListener('click', () => block.remove());

        container.appendChild(block);
        colorIndex++;
    });

    function addImageInput(container, colorIndex) {
    const div = document.createElement('div');

    div.innerHTML = `
        <div class="flex items-center gap-3">
            <input type="file" name="colors[${colorIndex}][images][]" class="border px-3 py-1 rounded" multiple required>
        </div>
    `;

    container.appendChild(div);
}


</script>

@endsection
