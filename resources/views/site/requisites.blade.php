@extends('layouts.clean')
@section('title-block')Реквизиты@endsection('title-block')
@section('content')
    <div class="row">
        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <div style="margin-left: 20px">
                <h3>Лемма-авто</h3>

                <h5>- магазин автозапчастей</h5>

                <p class="text">Мы предоставляем возможность найти и купить запасные части по
                    оптимальной цене. Мы сотрудничаем с надежными магазинами автозапчастей,
                    а так же постоянно работаем над наполнением базы поставщиков.</p>

                <p>
                    <a class="btn btn-outline-danger" href="{{ route('auto-parts') }}">
                        Подробнее &raquo;
                    </a>
                </p>
            </div>
        </div>

        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <div style="padding: 15px;">
                <div class="card shadow bg-body rounded" style="padding: 15px;">
                    <h2 style="text-align: center;margin-bottom: 16px;">
                        Наши реквизиты
                    </h2>

                    @foreach($requisites as $requisite)
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Название организации:</strong> {{ $requisite->title }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Юридический адрес:</strong> {{ $requisite->legal_address }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Реальный адрес:</strong> {{ $requisite->real_address }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>ИНН/КПП:</strong> {{ $requisite->inn_kpp }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Расчетный счет:</strong> {{ $requisite->r_s }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>Корреспондентский счет</strong> {{ $requisite->k_s }}
                        </li>
                        <li class="list-group-item" style="font-size:14px;text-align:left;padding:3px;">
                            <strong>БИК:</strong> {{ $requisite->bik }}
                        </li>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
            <livewire:user.advertisements.advertisements />
        </div>
    </div>
@endsection('content')
