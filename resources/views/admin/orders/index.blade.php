@extends('layouts.layoutControllers')
@section('content')
<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Управление заказами
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

        <h2 class="mb-10 font-semibold text-xl text-gray-800 leading-tight">
            Всего заказов: {{ \App\Models\Order::count() }}
        </h2>

        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">№ заказа</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Стоимость</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Статус</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Способ доставки</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 tracking-wider w-10">Действие</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->order_number }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ number_format($order->total, 2) }} руб.</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">
                            <!-- This is an example component -->
                                <label class="flex items-center">
                                    <input class="relative w-10 h-5 transition-all duration-200 ease-in-out bg-gray-400 cursor-pointer rounded-full shadow-inner outline-none appearance-none"
                                            type="checkbox" data-on="Completed" data-off="Processing" data-toggle="toggle"
                                            {{ $order->status=='completed' ? 'checked' : '' }} name="status" value="{{ $order->id }}"/>
                                </label>
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-300 text-sm leading-5">{{ $order->contact->address }}</td>


                            <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5">
                                <div class="">
                                    <a href="{{ route('admin-orders.edit', $order->id) }}">
                                        <button class="mb-2 bg-blue-500 mr-2 hover:bg-blue-700 text-white font-bold py-2
                                            px-4 rounded">
                                            Редактировать
                                        </button>
                                    </a><br>

                                    <form action="{{ route('admin-orders.destroy', $order['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Удалить" class="bg-red-500 hover:bg-red-700
                                            text-white font-bold py-2 px-4 rounded">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<style>
    input:before {
        content: '';
        position: absolute;
        width: 1.25rem;
        height: 1.25rem;
        border-radius: 50%;
        top: 0;
        left: 0;
        transform: scale(1.1);
        box-shadow: 0 0.125rem 0.5rem rgba(0, 0, 0, 0.2);
        background-color: white;
        transition: .2s ease-in-out;
    }

    input:checked {
        @apply: bg-indigo-400;
        background-color:#7f9cf5;
    }

    input:checked:before {
        left: 1.25rem;
    }
</style>
@endsection('content')

@section('scripts')
    <script>
        $('input[name=status]').change(function () {
            var mode=$(this).prop('checked');
            var id=$(this).val();
            $.ajax({
                url: "{{ route('admin-orders.status') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    mode: mode,
                    id: id
                },
                success: function (response) {
                    if(response.status) {
                        swal({
                            title: "Заказ {{ $order->order_number }}",
                            text: response.message,
                            icon: "success",
                            button: "Save"
                        });
                    }
                    else {
                        swal({
                            title: "Заказ {{ $order->order_number }}",
                            text: response.message,
                            icon: "warning",
                            button: "Save"
                        });
                    }
                }
            })
        });
    </script>
@endsection
