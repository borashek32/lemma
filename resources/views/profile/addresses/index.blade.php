@extends('layouts.layoutControllers')
@section('content')
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Управление контактами
            </h2>
        </div>
    </header>
<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if (session()->has('success'))
            <div class="bg-teal-100 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if(!$address)
                <div class="flex justify-betweent mb-4">
                    <div class="text-lef">
                        <a href="{{ route('addresses.create') }}">
                            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Новый адрес
                            </button>
                        </a>
                    </div>
                </div>
                <p class="mt-6">Пока адрес не добавлен</p>
            @else
                <table class="table-fixed w-full">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Имя</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Город</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Индекс</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Адрес</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Телефон</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Действие</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="trix-content">
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $address->shipping_fullname }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $address->shipping_city }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $address->shipping_postcode }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $address->shipping_address }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $address->shipping_phone }}</td>
                        <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                            <button class="mb-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                <a href="{{ route('addresses.edit', $address->id) }}">
                                    Редактировать
                                </a>
                            </button>
                            <form action="{{ route('addresses.destroy', $address->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                text-white font-bold py-2 px-4 rounded">
                            </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
@endsection('content')
