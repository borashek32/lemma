<div class="py-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if(Cart::instance('saveForLater')->count() > 0)
                <h2 class="mb-2">Всего товаров, отложенных на потом: {{ Cart::instance('saveForLater')->count() }}</h2>

                <div class="mb-6">
                    <a class="underline" href="/">В магазин</a>
                </div>
                <table class="table-fixed w-full table-order">
                    <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Каталожный<br>номер</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Название</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Цена</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действия</th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach(Cart::instance('saveForLater')->content() as $item)
                        <tr>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $item->model->code }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $item->model->title }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ number_format($item->model->price, 2) }} руб.</td>

                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <div class="">
                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                        @csrf
                                        <input type="submit" value="Вернуть" class="bg-blue-500 hover:bg-blue-700
                                                    text-white font-bold py-2 px-4 rounded">
                                    </form>

                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                                    text-white font-bold py-2 mt-2 px-4 rounded">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="flex flex-cols-2 items-center card-order">
                    @foreach(Cart::content() as $item)
                        <div class="bg-white shadow-xl rounded-lg overflow-hidden border-gray-200 m-4">
                            <div class="p-4">
                                <p class="uppercase tracking-wide text-sm font-bold text-gray-700">Каталожный номер • {{ $item->model->code }}</p>
                                <p class="text-3xl text-gray-900">Название • {{ $item->model->title }}</p>
                            </div>
                            <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
                                <div class="text-xs uppercase font-bold text-gray-600 tracking-wide flex flex-col-2">
                                    <p class="mt-2 mr-4">
                                        Количество
                                    </p>
                                    <input type="number" class="quantity outline-none focus:outline-none text-center w-20 bg-white
                                font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default
                                flex items-center text-gray-700 border border-gray-400 rounded-md p-2 outline-none"
                                           name="quantity" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}"
                                           step="1" min="1" max="99" value="{{ $item->qty }}">
                                </div>
                                <div class="text-xs uppercase font-bold text-gray-600 tracking-wide mt-4">
                                    Цена • {{ number_format($item->subtotal, 2) }} руб.
                                </div>
                                <div class="flex items-center pt-2">
                                    <div class="">
                                        <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">
                                            @csrf
                                            <input type="submit" value="Вернуть" class="bg-blue-500 hover:bg-blue-700
                                                    text-white font-bold py-2 px-4 rounded">
                                        </form>

                                        <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                        text-white mt-2 font-bold py-2 px-4 rounded">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-lg">
                    Отложенных товаров нет в корзине
                </div>
                <a href="{{ route('auto-parts') }}" class="underline">
                    В магазин
                </a>
            @endif
        </div>
    </div>
</div>
