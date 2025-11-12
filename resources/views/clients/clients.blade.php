@extends('Welcome')

    @section('content')
        <h1 class="text-center text-5xl text-purple-500">clients liste</h1>

<div class="relative  p-20 overflow-x-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    client id
                </th>
                <th scope="col" class="px-6 py-3">
                    client name
                </th>
                <th scope="col" class="px-6 py-3">
                    client email
                </th>
                <th scope="col" class="px-6 py-3">
                    phone number
                </th>
                <th scope="col" class="px-6 py-3">
                    client address
                </th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($clients as $c)
                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 border-gray-200">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$c['id']}}
                    </th>
                    <td class="px-6 py-4">
                        {{$c['nom']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$c['email']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$c['telephone']}}
                    </td>
                    <td class="px-6 py-4">
                        {{$c['addresse']}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

    @endsection