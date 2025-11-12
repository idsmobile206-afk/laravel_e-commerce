@extends('Welcome')

    @section('content')
        <h1 class="text-center text-5xl text-purple-500">products liste</h1>

<div class="relative  p-20 overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product id
                </th>
                <th scope="col" class="px-6 py-3">
                    product name
                </th>
                <th scope="col" class="px-6 py-3">
                    product price
                </th>
                <th scope="col" class="px-6 py-3">
                    stock
                </th>
                <th scope="col" class="px-6 py-3">
                    image
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $p)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$p['id']}}
                    </th>
                    <td class="px-6 py-4">
                        {{$p['nom']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$p['prix']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$p['stock']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$p['image']}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endsection