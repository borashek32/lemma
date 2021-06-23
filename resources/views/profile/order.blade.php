@section('title-block')Контакты@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Детали заказа') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                    <h2 class="mb-2">Заказ № {{ $order->order_number }} </h2>

                    <a href="{{ route('auto-parts') }}">
                        <p class="underline">В магазин</p>
                    </a>

                    <br>

                    <table class="table-fixed w-full">
                        <thead>
                        <tr class="bg-gray-100">
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Стоимость</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Статус</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Оплата</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Пунтк выдачи</th>
                            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Позиции</th>
                        </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ number_format($order->total, 2) }} руб.</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->status }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->payment->payment_method }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: normal">{{ $order->contact->address }}</td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: normal">
                                    @foreach($order->products as $product)
                                        <p>№ {{ $product->code }} - {{ $product->title }} - {{ $product->pivot->product_quantity }} шт. * {{ number_format($product->price, 2) }} руб.</p>
                                        <br>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</x-app-layout>

