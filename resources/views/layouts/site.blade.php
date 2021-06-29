<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Продажа автозапчастей на иномарки, быстрая доставка, доступные цены, удобный самовывоз">
    <title>Лемма-авто: @yield('title-block')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('css/site.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sharingbuttons.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@1.2.3/dist/trix.css">
</head>

<body>
    @include('includes.header')
    <div class="container">
        <div class="site-index">
            <div class="jumbotron blog">
                <div class="row">
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12 col-6">
                        <p>108814,<br>город Москва, поселение Сосенское,<br>
                            поселок Коммунарка, Бачуринская улица,<br>
                            дом 317Ю, офис 5а</p>
                        <h1 class="spacePromo">Лемма-авто</h1>
                        <h2 class="lead">Качество в деталях</h2>

                        @include('includes.contact_button')
                        @include('includes.messages_errors')

                        <div class="phone">
                            <a href="tel:+79999999999" class="textAddress">
                                +7 999 9999999
                            </a><br>
                            <a href="mailto:mail@lemma-auto.ru">
                                mail@lemma-auto.ru
                            </a>
                        </div>
                    </div>

                    <div class="header-advs col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6 rounded-lg" style="background-color: rgba(227,155,12,0.5)">
                        <div class="">
                            <ul>
                                <li style="margin-bottom: 20px; list-style: none"><h4 style="font-weight: 600; color: white; padding-top: 20px">Помощь в подборе запчастей</h4></li>
                                <li style="margin-bottom: 20px; list-style: none"><h4 style="font-weight: 600; color: white;">Большой выбор расходных материалов</h4></li>
                                <li style="margin-bottom: 20px; list-style: none"><h4 style="font-weight: 600; color: white;">Доставка крупногабаритных заказов</h4></li>
                                <li class="worldWideDelivery" style="margin-bottom: 20px; list-style: none"><h4 style="font-weight: 600; color: white;">Доставка в любую страну мира</h4></li>
                            </ul>
                        </div>
                    </div>

                    <div class="rounded-lg col-xl-3 col-lg-3 col-md-3 ">
                        <div style="background-color: rgba(227,155,12,0.5)" class="rounded-lg">
                            <div class="lastPosts" style="padding: 10px">
                                <p class="text-right" style="font-size: 18px;">Интересное в блоге</p>
                                @include('includes.posts-slider')
                            </div>
                        </div>
                        <div class="flash1"></div>
                    </div>
                </div>

                <div class="flash"></div>
            </div>

            <div class="body-content">
                @include('includes.messages_success')
                <div class="row">
                    @yield('content')
                </div>
            </div>
        </div>

        @include('includes.footer')
    </div>

    <div id='app'></div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    @yield('scripts')
</body>
</html>
