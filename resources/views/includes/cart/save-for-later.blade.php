{{--<div class="py-4">--}}
{{--    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">--}}
{{--            @if(Cart::instance('saveForLater')->count() > 0)--}}
{{--                <h2 class="mb-2">Всего товаров, отложенных на потом: {{ Cart::instance('saveForLater')->count() }}</h2>--}}

{{--                <div class="mb-6">--}}
{{--                    <a class="underline" href="/">В магазин</a>--}}
{{--                </div>--}}
{{--                <table class="table-fixed w-full">--}}
{{--                    <thead>--}}
{{--                    <tr class="bg-gray-100">--}}
{{--                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>--}}
{{--                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Каталожный<br>номер</th>--}}
{{--                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Название</th>--}}
{{--                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Цена</th>--}}
{{--                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действия</th>--}}
{{--                    </tr>--}}
{{--                    </thead>--}}

{{--                    <tbody>--}}
{{--                    @foreach(Cart::instance('saveForLater')->content() as $item)--}}
{{--                        <tr>--}}
{{--                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>--}}
{{--                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $item->model->code }}</td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $item->model->title }}</td>--}}
{{--                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ number_format($item->model->price, 2) }} руб.</td>--}}

{{--                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">--}}
{{--                                <div class="">--}}
{{--                                    <form action="{{ route('saveForLater.switchToCart', $item->rowId) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        <input type="submit" value="Добавить к заказу" class="bg-blue-500 hover:bg-blue-700--}}
{{--                                                    text-white font-bold py-2 px-4 rounded">--}}
{{--                                    </form>--}}

{{--                                    <form action="{{ route('saveForLater.destroy', $item->rowId) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                        @method('DELETE')--}}
{{--                                        <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700--}}
{{--                                                    text-white font-bold py-2 mt-2 px-4 rounded">--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                    @endforeach--}}
{{--                    </tbody>--}}
{{--                </table>--}}
{{--            @else--}}
{{--                <div class="text-lg">--}}
{{--                    Отложенных товаров нет в корзине--}}
{{--                </div>--}}
{{--                <a href="{{ route('auto-parts') }}" class="underline">--}}
{{--                    В магазин--}}
{{--                </a>--}}
{{--            @endif--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
