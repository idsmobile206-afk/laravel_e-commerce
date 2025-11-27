@extends('welcome')

@section('content')
<div class="py-10 px-8">

    {{-- HEADER + ADD BUTTON --}}
    <div class="flex justify-between items-center mb-10">
        <h1 class="text-4xl font-bold text-purple-600">
            Products List
        </h1>

        <a href="{{ route('products.create') }}"
           class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition">
            + Add Product
        </a>
    </div>

    <div class="relative overflow-x-auto shadow rounded-lg">
        <table class="w-full text-sm text-left text-gray-600">
            <thead class="text-xs uppercase bg-gray-100 text-gray-700">
                <tr>
                    <th class="px-6 py-3">ID</th>
                    <th class="px-6 py-3">Image</th>
                    <th class="px-6 py-3">Name</th>
                    <th class="px-6 py-3">Price</th>
                    <th class="px-6 py-3">Stock</th>
                    <th class="px-6 py-3">Brand</th>
                    <th class="px-6 py-3">Category</th>
                    <th class="px-6 py-3">Gender</th>
                    <th class="px-6 py-3">Type</th>
                    <th class="px-6 py-3">Sizes</th>
                    <th class="px-6 py-3">Colors</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($products as $p)
                <tr class="bg-white border-b hover:bg-gray-50">

                    {{-- ID --}}
                    <td class="px-6 py-4 font-semibold text-gray-900">
                        {{ $p->id }}
                    </td>

                    {{-- FIRST COLOR → FIRST IMAGE --}}
                    @php
                        $firstColor = $p->productColors->first();
                        $firstImg = $firstColor?->images->first();
                    @endphp

                    <td class="px-6 py-4">
                        @if ($firstImg)
                            <img src="{{ asset('storage/' . $firstImg->image_path) }}"
                                 class="h-20 w-20 object-cover rounded border" />
                        @else
                            <span class="text-gray-400">No Image</span>
                        @endif
                    </td>

                    {{-- BASIC DATA --}}
                    <td class="px-6 py-4">{{ $p->name }}</td>
                    <td class="px-6 py-4">{{ $p->price }} DH</td>
                    <td class="px-6 py-4">{{ $p->stock }}</td>

                    {{-- RELATIONS --}}
                    <td class="px-6 py-4">{{ $p->brand?->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $p->category?->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $p->gender?->name ?? '—' }}</td>
                    <td class="px-6 py-4">{{ $p->type?->name ?? '—' }}</td>

                    {{-- SIZES --}}
                    <td class="px-6 py-4">
                        @if ($p->sizes->count())
                            <div class="flex flex-wrap gap-2">
                                @foreach ($p->sizes as $s)
                                    <span class="px-2 py-1 border rounded bg-gray-50">
                                        {{ $s->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            —
                        @endif
                    </td>

                    {{-- COLORS --}}
                    <td class="px-6 py-4">
                        <div class="flex gap-2">
                            @foreach ($p->productColors as $pc)
                                <div class="h-6 w-6 rounded border"
                                     style="background-color: {{ $pc->color->hex_code }}">
                                </div>
                            @endforeach
                        </div>
                    </td>

                    {{-- ACTION BUTTONS --}}
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center gap-2">

                            {{-- DETAILS --}}
                            <a href="{{ route('products.show', $p->id) }}"
                               class="px-3 py-1 bg-blue-600 text-white rounded hover:bg-blue-700">
                                Details
                            </a>

                            {{-- EDIT --}}
                            <a href="{{ route('products.edit', $p->id) }}"
                               class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600">
                                Edit
                            </a>

                            {{-- DELETE --}}
                            <form action="{{ route('products.destroy', $p->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700">
                                    Delete
                                </button>
                            </form>

                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>
@endsection
