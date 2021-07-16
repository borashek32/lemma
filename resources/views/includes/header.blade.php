<div class="d-flex flex-column flex-md-row align-items-center
p-2 px-md-4 mb-3 border-bottom shadow-sm navbar sticky-top navbar-light bg-light">
    <h5 class="my-0 text-dark mr-md-auto font-weight-normal z-40 ml-0 mt-0 bg-gray-400">
        <a href="/">
            Лемма-авто
        </a>
    </h5>
    <h7>

    </h7>

    <nav class="big my-2 my-md-0 mr-md-3">
{{--        <a class="p-2 text-dark" href="{{ route('services') }}">Наши услуги</a>--}}

        <a class="p-2 text-dark" href="{{ route('auto-parts') }}">Магазин</a>

        <a class="p-2 text-dark" href="{{ route('blog') }}">Автожурнал</a>

        <a class="p-2 text-dark" href="{{ route('reviews') }}">Отзывы</a>

        <a class="p-2 text-dark" href="{{ route('law') }}">Гарантии</a>

        <a class="p-2 text-dark" href="{{ route('requisites') }}">Реквизиты</a>

        <a class="p-2 text-dark" href="{{ route('contact') }}">Контакты</a>
    </nav>

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-2 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Личный кабинет</a>

                @if(Auth::user()->hasRole('user'))
                    <a href="{{ route('cart.index') }}" class="text-sm ml-2 text-gray-700 underline">
                        Корзина
                        ({{ Cart::instance('default')->count() }})
                    </a>
                @endif
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Вход</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Регистрация</a>
                @endif
            @endif
        </div>
    @endif
</div>
