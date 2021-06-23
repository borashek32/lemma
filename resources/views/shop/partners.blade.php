@extends('layouts.site')

@section('title-block')Наши партнеры@endsection('title-block')

@section('content')
    <div class="site-index">
        <div class="body-content">
            <h2>Наши партнеры:</h2>
            <div class="row">
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="wrapCard">
                        <div class="card" style="width: 10rem;">
                            <img src="/img/motul.jpg" width="160" class="card-img-top partners img-fluid" alt="Motul">
                            <div class="card-body">
                                <h5 class="card-title">Автомасла</h5>
                                <a href="http://motul-ishop.ru/" class="btn btn-outline-danger">Motul</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="wrapCard">
                        <div class="card" style="width: 10rem; margin-right: 50px">
                            <img src="/img/yural.jpg" width="160" class="card-img-top partners img-fluid" alt="Yural">
                            <div class="card-body">
                                <p class="card-text">Автозапчасти</p>
                                <a href="https://favorit-parts.ru/" class="btn btn-outline-primary">Yural</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="wrapCard">
                        <div class="card" style="width: 10rem;">
                            <img src="/img/autoeuro.jpg" width="160" class="card-img-top partners img-fluid" alt="AutoEuro">
                            <div class="card-body">
                                <p class="card-text">Автозапчасти</p>
                                <a href="https://shop.autoeuro.ru/" class="btn btn-outline-info">AutoEuro</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="wrapCard">
                        <div class="card" style="width: 10rem;">
                            <img src="/img/vianor.jpg" width="160" class="card-img-top partners img-fluid" alt="Vianor">
                            <div class="card-body">
                                <p class="card-text">Автошины</p>
                                <a href="https://vianor.ru" class="btn btn-outline-danger">Vianor</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3 col-md-4 col-6">
                    <div class="wrapCard">
                        <div class="card" style="width: 10rem;">
                            <img src="/img/emex.jpg" width="160" class="partnersEmex img-fluid" alt="emex">
                            <div class="card-body">
                                <p class="card-text">Автозапчасти</p>
                                <a href="https://emex.ru/" class="btn btn-outline-warning">Emex</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')

