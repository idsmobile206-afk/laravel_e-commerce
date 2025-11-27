@extends('welcome')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6">
    <h1 class="text-3xl font-bold mb-8 text-gray-800">Product Colors</h1>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach ($colors as $color)
            <div class="flex flex-col items-center bg-white p-4 rounded-xl shadow hover:shadow-md transition">
                <div 
                    class="h-20 w-20 rounded-lg border"
                    style="background-color: {{ $color->hex_code }}"
                ></div>

                <p class="mt-3 text-sm text-gray-700">
                    <span class="font-semibold">ID:</span> {{ $color->id }}
                </p>
                <p class="text-sm text-gray-700">
                    <span class="font-semibold">Name:</span> {{ $color->name }}
                </p>
            </div>
        @endforeach
    </div>
</div>
@endsection
