@extends('layouts.site')

@section('title-block')Магазин автозапчастей@endsection('title-block')

@section('content')
    <div class="autoparts-big">
        <div class="row">
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="leftColumn">
                    @include('includes.shop.left-column')
                </div>
            </div>

            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;">
                    @include('includes.shop.search')
                    @if(!empty($search))
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th class="text-center">Каталожный<br>номер</th>
                                <th class="text-center">Название</th>
                                <th class="text-center">Цена</th>
                                <th class="text-center">Остаток<br>на складе</th>
                                <th class="text-center">Заказать</th>
                            </tr>
                            </thead>

                            @forelse($products as $product)
                                <tbody>
                                <tr>
                                    <td>{{ $product->code }}</td>
                                    <td style="white-space: pre-line">{{ $product->title }}</td>
                                    <td>{{ $product->price }} руб.</td>
                                    <td>{{ $product->stock_quantity }} шт.</td>

                                    <td style="display: flex; justify-items: center">
                                        <form action="{{ route('cart.store', $product->id) }}"
                                              style="height: 35px;padding-bottom: 3px" method="POST">
                                            @csrf

                                            <input type="hidden" name="id" value="{{ $product->id }}">
                                            <input type="hidden" name="name" value="{{ $product->code }}">
                                            <input type="hidden" name="price" value="{{ $product->price }}">

                                            <button type="submit" style="width: 100px; height: 36px" class="btn btn-secondary">
                                                <p class="text">
                                                    В корзину
                                                </p>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                </tbody>
                            @empty
                                <p class="text-center">
                                    Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                                </p>
                            @endforelse
                        </table>
                        <div style="display: flex;justify-content: center; margin-top: 20px">
                            {{ $products->appends(['search' => request()->query('search')])->links() }}
                        </div>
                    @else
                        <div class="mt-20">
                            Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
                            <br>
                            Или свяжитесь с нашим менеджером для помощи в подборе запасной части
                            <br>
                            <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
                <div class="advertisements">
                    <livewire:user.advertisements.advertisements />
                </div>
            </div>
        </div>
    </div>

    <div class="autoparts-small p-8">
        <div class="card shadow bg-body rounded" style="font-size: 14px;padding: 15px;margin: 15px">
            @include('includes.shop.search')
            @if(!empty($search))
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">Каталожный<br>номер</th>
                        <th class="text-center">Название</th>
                        <th class="text-center">Цена</th>
                        <th class="text-center">Остаток<br>на складе</th>
                        <th class="text-center">Заказать</th>
                    </tr>
                    </thead>

                    @forelse($products as $product)
                        <tbody>
                        <tr>
                            <td>{{ $product->code }}</td>
                            <td style="white-space: pre-line">{{ $product->title }}</td>
                            <td>{{ $product->price }} руб.</td>
                            <td>{{ $product->stock_quantity }} шт.</td>

                            <td style="display: flex; justify-items: center">
                                <form action="{{ route('cart.store', $product->id) }}"
                                      style="height: 35px;padding-bottom: 3px" method="POST">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <input type="hidden" name="name" value="{{ $product->code }}">
                                    <input type="hidden" name="price" value="{{ $product->price }}">

                                    <button type="submit" style="width: 100px; height: 36px" class="btn btn-secondary">
                                        <p class="text">
                                            В корзину
                                        </p>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    @empty
                        <p class="text-center">
                            Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                        </p>
                    @endforelse
                </table>
                <div style="display: flex;justify-content: center; margin-top: 20px">
                    {{ $products->appends(['search' => request()->query('search')])->links() }}
                </div>
            @else
                <div class="mt-20">
                    Вы можете найти нужную автозапчасть по каталожному номеру или по названию.
                    <br>
                    Или свяжитесь с нашим менеджером для помощи в подборе запасной части
                    <br>
                    <a href="tel:+79267013882" style="margin-top: -10px">+79267013882</a> - Вадим
                </div>
            @endif
        </div>
        <div class="leftColumn">
            @include('includes.shop.left-column')
        </div>
    </div>
@endsection('content')
