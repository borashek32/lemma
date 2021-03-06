@section('title-block')Корзина@endsection('title-block')

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-md text-gray-800 leading-tight">
            <a href="{{ route('cart.index') }}">
                Корзина
                ({{ Cart::instance('default')->count() }})
            </a>

            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
            </svg>

            Оплата и доставка
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('includes.messages')

            <form id="form" action="{{ route('orders.store') }}" method="POST" class="w-full bg-white shadow-md rounded px-8 pt-6 pb-8 mt-4">
                @csrf
                <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">
                    Выберите способ оплаты
                </h1>

                <div class="grid grid-cols-1 mb-8 gap-4">
                    <div>
                        @include('includes.order.payment-methods')
                    </div>
                </div>

                <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">
                    Выберите пункт самовывоза или заполните адресс доставки
                </h1>

                <div class="grid grid-cols-2 gap-4 row-order">
                    <div class="bg-gray-200 mb-6">
                        @include('includes.order.pickup_offices')
                    </div>

                    <div class="bg-gray-200 mb-6">
                        @include('includes.order.shipment_address')
                    </div>
                </div>

                <div class="grid grid-cols-1 gap-4 column-order">
                    <div class="bg-gray-200 mb-6">
                        @include('includes.order.pickup_offices')

                        @include('includes.order.shipment_address')
                    </div>
                </div>
                <style>
                    .column-order {
                        display: none;
                    }
                    @media (max-width: 760px) {
                        .row-order {
                            display: none;
                        }
                        .column-order {
                            display: block;
                        }
                    }
                </style>

                <div class="flex items-center mt-6 justify-between">
                    <button id="submit"
                            onClick="ValidateForm(this.form)"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded
                            focus:outline-none focus:shadow-outline"
                            type="submit">
                        Продолжить
                    </button>
                </div>
            </form>

            <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery.maskedinput@1.4.1/src/jquery.maskedinput.min.js" type="text/javascript"></script>
            <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>
            <script>
                $("#shipping_phone").mask("+7(999) 999-9999");
                $("#shipping_postcode").mask("999999");
            </script>
        </div>
    </div>
</x-app-layout>

@section('scripts')

@endsection

