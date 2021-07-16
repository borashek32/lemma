<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <style>
                    @media (max-width: 1132px) {
                        #line {
                            display: none;
                        }
                    }
                </style>
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center mt-5">
                    <a href="{{ route('auto-parts') }}">
                        <img src="{{ asset('img/icon.png') }}" width="100" alt="Lemma-auto">
                    </a>
                </div>
                <!-- Navigation Links -->
                <div id="line" class="text-center hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('welcome') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Добро пожаловать') }}
                    </x-jet-nav-link>
                </div>
                <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('profile') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Профиль') }}
                    </x-jet-nav-link>
                </div>
                @if(Auth::user()->hasRole('user'))
                    <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                        <x-jet-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Корзина') }}
                            ({{ Cart::count() }})
                        </x-jet-nav-link>
                    </div>
                    <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                        <x-jet-nav-link href="{{ route('orders.all') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Ваши заказы') }}
                            ({{ Auth::user()->orders->count() }})
                        </x-jet-nav-link>
                    </div>
                    <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                        <x-jet-nav-link href="{{ route('addresses.index') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Контакты') }}
                        </x-jet-nav-link>
                    </div>
                    <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                        <x-jet-nav-link href="{{ route('mailings.index') }}" :active="request()->routeIs('dashboard')">
                            {{ __('Подписка') }}
                        </x-jet-nav-link>
                    </div>
                    <div id="line" class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 30px">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-nav-link href="{{ route('logout') }}" :active="request()->routeIs('dashboard')"
                                                       onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Выйти') }}
                            </x-jet-nav-link>
                        </form>
                    </div>
                @endif
                @if(Auth::user()->hasRole('super-admin'))
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="#">
                                        {{ __('Каталог автозапчастей') }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </x-jet-nav-link>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Blog Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Управление каталогом автозапчастей') }}
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('auto-parts-admin') }}">
                                        {{ __('Автозапчасти') }}
                                    </x-jet-nav-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="#">
                                        {{ __('Пользователи') }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </x-jet-nav-link>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Blog Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Управление пользователями') }}
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('users') }}">
                                        {{ __('Все пользователи') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="#">
                                        {{ __('Клиенты') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('reviews-admin') }}">
                                        {{ __('Отзывы клиентов') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('admin-orders.index') }}">
                                        {{ __('Заказы') }}
                                    </x-jet-nav-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="#">
                                        {{ __('Автожурнал') }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </x-jet-nav-link>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Blog Management -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Управление блогом') }}
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('posts.index') }}">
                                        {{ __('Посты') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('cats') }}">
                                        {{ __('Категории') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('tags') }}">
                                        {{ __('Теги') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('comments-admin') }}">
                                        {{ __('Комментарии') }}
                                    </x-jet-nav-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-jet-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="#">
                                        {{ __('Разное') }}
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                                    </x-jet-nav-link>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <!-- Management of different pages -->
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('offices') }}">
                                        {{ __('Офисы') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('members.index') }}">
                                        {{ __('Команда') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('requisites-admin') }}">
                                        {{ __('Реквизиты') }}
                                    </x-jet-nav-link>
                                </div>
                                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                                    <x-jet-nav-link href="{{ route('advertisements.index') }}">
                                        {{ __('Реклама') }}
                                    </x-jet-nav-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </div>
                @endif
            </div>
        <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="/storage/{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" />
                            </button>
                        @else
                            <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endif
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Управление аккаунтом') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('welcome') }}">
                            {{ __('Добро пожаловать') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('profile') }}">
                            {{ __('Профиль') }}
                        </x-jet-dropdown-link>

                        @if(Auth::user()->hasRole('user'))
                            <x-jet-dropdown-link href="{{ route('cart.index') }}">
                                {{ __('Корзина') }}
                                ({{ Cart::count() }})
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('orders.all') }}">
                                {{ __('Заказы') }}
                                ({{ Auth::user()->orders->count() }})
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="{{ route('addresses.index') }}">
                                {{ __('Контакты') }}
                            </x-jet-dropdown-link>
                        @endif

                        @if(Auth::user()->hasRole('super-admin'))
                            <x-jet-dropdown-link href="#">
                                {{ __('Категории постов') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="#">
                                {{ __('Посты') }}
                            </x-jet-dropdown-link>

                            <x-jet-dropdown-link href="#">
                                {{ __('Отзывы') }}
                            </x-jet-dropdown-link>
                        @endif
                        {{--                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())--}}
                        {{--                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">--}}
                        {{--                                {{ __('API Tokens') }}--}}
                        {{--                            </x-jet-dropdown-link>--}}
                        {{--                        @endif--}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Team Management -->
                        @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Team') }}
                            </div>

                            <!-- Team Settings -->
                            <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                {{ __('Team Settings') }}
                            </x-jet-dropdown-link>

                            @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                    {{ __('Create New Team') }}
                                </x-jet-dropdown-link>
                            @endcan

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Switcher -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Switch Teams') }}
                            </div>

                            @foreach (Auth::user()->allTeams() as $team)
                                <x-jet-switchable-team :team="$team" />
                            @endforeach

                            <div class="border-t border-gray-100"></div>
                    @endif

                    <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                            this.closest('form').submit();">
                                {{ __('Выход') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            </div>

<!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('profile.show') }}">
                {{ __('Панель упарления') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            @if(Auth::user()->hasRole('user'))
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Корзина') }}
                        ({{ Cart::instance('default')->count() }})
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('orders.all') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Ваши заказы') }}
                        ({{ Auth::user()->orders->count() }})
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('addresses.index') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Контакты') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('mailings.index') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Подписка') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 30px">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-jet-nav-link href="{{ route('logout') }}" :active="request()->routeIs('dashboard')"
                                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                            {{ __('Выйти') }}
                        </x-jet-nav-link>
                    </form>
                </div>
            @endif
            @if(Auth::user()->hasRole('super-admin'))
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('auto-parts-admin') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Автозапчасти') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('auto-parts-admin') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Все пользователи') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="#">
                        {{ __('Клиенты') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('reviews-admin') }}">
                        {{ __('Отзывы клиентов') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('admin-orders.index') }}">
                        {{ __('Заказы') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('posts.index') }}">
                        {{ __('Посты') }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('cats') }}">
                        {{ __('Категории') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('comments-admin') }}">
                        {{ __('Комментарии') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('offices') }}">
                        {{ __('Офисы') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('members.index') }}">
                        {{ __('Команда') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('requisites-admin') }}">
                        {{ __('Реквизиты') }}
                    </x-jet-nav-link>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="margin-top: 20px">
                    <x-jet-nav-link href="{{ route('advertisements.index') }}">
                        {{ __('Реклама') }}
                    </x-jet-nav-link>
                </div>
            @endif

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Профиль') }}
                </x-jet-responsive-nav-link>

                @if(Auth::user()->hasRole('user'))
                    <x-jet-responsive-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Корзина') }}
                        ({{ Cart::count() }})
                    </x-jet-responsive-nav-link>
                    <x-jet-responsive-nav-link href="{{ route('cart.index') }}" :active="request()->routeIs('profile.show')">
                        {{ __('Корзина') }}
                        ({{ Cart::count() }})
                    </x-jet-responsive-nav-link>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Выйти') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

