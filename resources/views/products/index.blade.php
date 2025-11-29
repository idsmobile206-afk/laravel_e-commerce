@extends('welcome')

@section('content')
<div class="py-6 px-6">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-semibold text-gray-800">Products</h1>

        <a href="{{ route('products.create') }}"
           class="px-3 py-1.5 text-sm border border-black text-black rounded hover:bg-black hover:text-white transition">
            + Add
        </a>
    </div>

    <div class="relative overflow-x-auto rounded-lg border border-gray-200 bg-white">
        <table class="w-full text-sm text-left text-gray-700">

            <thead class="bg-gray-100 text-gray-600 text-xs">
                <tr>
                    <th class="px-4 py-2 font-medium">ID</th>
                    <th class="px-4 py-2 font-medium">Product</th>
                    <th class="px-4 py-2 font-medium">Price</th>
                    <th class="px-4 py-2 font-medium">Stock</th>
                    <th class="px-4 py-2 font-medium">Brand</th>
                    <th class="px-4 py-2 font-medium">Category</th>
                    <th class="px-4 py-2 font-medium">Gender</th>
                    <th class="px-4 py-2 font-medium">Sizes</th>
                    <th class="px-4 py-2 font-medium">Colors</th>
                    <th class="px-4 py-2 text-center font-medium">Actions</th>
                </tr>
            </thead>

            <tbody class="bg-white">
                @foreach ($products as $p)
                <tr class="border-b hover:bg-gray-50">

                    {{-- ID --}}
                    <td class="px-4 py-2 text-gray-800">{{ $p->id }}</td>

                    {{-- PRODUCT CELL --}}
                    @php
                        $firstColor = $p->productColors->first();
                        $firstImg = $firstColor?->images->first();
                    @endphp

                    <td class="px-4 py-2">
                        <div class="flex items-center gap-3">

                            {{-- Product Image --}}
                            @if ($firstImg)
                                <img src="{{ asset('storage/' . $firstImg->image_path) }}"
                                     class="h-12 w-12 object-cover rounded border">
                            @else
                                <div class="h-12 w-12 flex items-center justify-center text-gray-400 border rounded text-xs">—</div>
                            @endif

                            {{-- Name + Type --}}
                            <div class="flex flex-col leading-tight">
                                <span class="font-medium text-gray-900 text-sm">{{ $p->name }}</span>
                                <span class="text-xs text-gray-500">{{ $p->type?->name ?? '—' }}</span>
                            </div>

                        </div>
                    </td>

                    {{-- BASIC DATA --}}
                    <td class="px-4 py-2">{{ $p->price }} DH</td>
                    <td class="px-4 py-2">{{ $p->stock }}</td>
                    <td class="px-4 py-2">{{ $p->brand?->name ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $p->category?->name ?? '—' }}</td>
                    <td class="px-4 py-2">{{ $p->gender?->name ?? '—' }}</td>

                    {{-- SIZES — STACKED LIST --}}
                    <td class="px-4 py-2 text-xs">
                        @if ($p->sizes->count())
                            <div class="flex flex-col gap-1">
                                @foreach ($p->sizes as $s)
                                    <span class="px-1 py-0.5 border rounded bg-white text-gray-700 text-xs inline-block w-fit">
                                        {{ $s->name }}
                                    </span>
                                @endforeach
                            </div>
                        @else
                            —
                        @endif
                    </td>

                    {{-- COLORS — TINY DOTS --}}
                    <td class="px-4 py-2">
                        <div class="flex gap-1.5">
                            @foreach ($p->productColors as $pc)
                                <div class="h-3 w-3 rounded-full border"
                                     style="background-color: {{ $pc->color->hex_code }}"></div>
                            @endforeach
                        </div>
                    </td>

                    {{-- ACTIONS --}}
                    <td class="px-4 py-2 text-center">
                        <div class="flex justify-center gap-1">

                            <a href="{{ route('products.show', $p->id) }}"
                               class="px-2 py-1 text-xs border border-black text-black rounded hover:bg-black hover:text-white transition">
                                View
                            </a>

                            <a href="{{ route('products.edit', $p->id) }}"
                               class="px-2 py-1 text-xs border border-gray-800 text-gray-800 rounded hover:bg-gray-800 hover:text-white transition">
                                Edit
                            </a>

                            <form action="{{ route('products.destroy', $p->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button
                                    class="px-2 py-1 text-xs border border-red-700 text-red-700 rounded hover:bg-red-700 hover:text-white transition">
                                    Del
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
