<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
    @if(Cart::count() > 0)
        <h2 class="mb-2">Всего товаров в вашей корзине: {{ Cart::count() }} шт.</h2>

        <p class="mb-2">Итоговая стоимость: {{ Cart::total() }} руб.</p>

        <a href="{{ route('auto-parts') }}">
            <p class="underline">В магазин</p>
        </a>
        <br>
        <table class="table-fixed w-full">
            <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Каталожный<br>номер</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Название</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Количество</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Цена</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действия</th>
            </tr>
            </thead>

            <tbody>
            @foreach(Cart::content() as $item)
                <tr>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $loop->iteration }}</td>
                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">{{ $item->model->code }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5" style="white-space: pre-line">{{ $item->model->title }}</td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                        <input type="number" class="quantity outline-none focus:outline-none text-center w-20 bg-white
                                    font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default
                                    flex items-center text-gray-700 border border-gray-400 rounded-md p-2 outline-none"
                                    name="quantity" data-id="{{ $item->rowId }}" id="qty-input-{{ $item->rowId }}"
                                    step="1" min="1" max="99" value="{{ $item->qty }}">
{{--                            @for ($i = 1; $i < 5 + 1 ; $i++)--}}
{{--                                <option {{ $item->qty == $i ? 'selected' : '' }}>{{ $i }}</option>--}}
{{--                            @endfor--}}
{{--                        </select>--}}
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ number_format($item->subtotal, 2) }} руб.</td>

                    <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                        <div class="">
{{--                            <form action="{{ route('cart.switchToSaveForLater', $item->rowId) }}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="submit" value="Отложить товар" class="bg-blue-500 hover:bg-blue-700--}}
{{--                                                    text-white font-bold py-2 px-4 rounded">--}}
{{--                            </form>--}}

                            <form action="{{ route('cart.destroy', $item->rowId) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                            text-white mt-2 font-bold py-2 px-4 rounded">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="m-10">
            <a href="{{ route('shipment') }}" class="bg-green-500 hover:bg-green-700
                   text-white font-bold py-2 px-4 rounded">
                Заказать
            </a>
        </div>
    @else
        <div class="text-lg">
            Товаров пока нет в корзине. Перейдите по ссылке в магазин автозапчестей и расходных материалов
        </div>
        <a href="{{ route('auto-parts') }}">
            В магазин
        </a>
    @endif
</div>

<script>
    (function () {
        const classname = document.querySelectorAll('.quantity')

        Array.from(classname).forEach(function(element) {
            element.addEventListener('change', function () {
                const id = element.getAttribute('data-id')
                axios.patch(`/dashboard/cart/${id}`, {
                    quantity: this.value
                })
                    .then(function (success) {
                        // console.log(response);
                        window.location.href = '{{ route('cart.index') }}'
                    })
                    .catch(function (error) {
                        // console.log(error);
                        window.location.href = '{{ route('cart.index') }}'
                    });
            })
        })
    })();
</script>

