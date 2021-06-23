@extends('layouts.site')
@section('title-block')О нас@endsection('title-block')
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
                    Наша команда
                </h2>

                <div class="row">
                    @foreach($members as $member)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6">
                            <div class="card mb-4 shadow">
                                <ul class="list-group list-group-flush">
                                    <li style="text-align: center" class="list-group-item">
                                        {{ $member->name }}
                                    </li>

                                    <li class="list-group-item" style="display:flex;justify-content: center;align-items:
                                    center;padding: 10px;overflow: hidden; ">
                                        <img src="{{ $member->photo }}" style="height: 100px; background-size: cover"
                                             alt="{{ $member->name }}" />
                                    </li>

                                    <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                                        <a href="tel:{{ $member->phone }}">
                                            {{ $member->phone }}
                                        </a>
                                    </li>

                                    <li class="list-group-item" style="font-size:16px;text-align:center;padding:3px;">
                                        {{ $member->position }}
                                    </li>

                                    <li class="list-group-item" style="font-size:14px;text-align:center;padding:3px;">
                                        {{ $member->description }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
        <livewire:user.advertisements.advertisements />
    </div>
</div>
@endsection('content')
