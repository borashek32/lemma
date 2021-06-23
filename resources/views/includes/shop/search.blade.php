<h3 class="mb-2" style="text-align: center">Поиск автозапчастей</h3>

<div class="row">
    <div class="col-xl-10 cpl-lg-10 col-md-10 col-sm-10 col-10">
        <form method="get" action="{{ route('auto-parts') }}" class="input-group mb-4">
            <input type="text" class="form-control shadow p-3 bg-body rounded"
                   style="margin-bottom:0px;margin-right: 10px" placeholder="Введите каталожный номер или название"
                   aria-label="Username" id="search" name="search" aria-describedby="basic-addon1">

            <button type="submit" class="btn btn-secondary" style="height: 40px">
                Поиск
            </button>
        </form>
    </div>
    <div class="col-xl-2 cpl-lg-2 col-md-2 col-sm-2 col-2">
        <a href="{{ route('auto-parts') }}">
            <button class="btn btn-success" style="margin-left: -20px;height: 40px;margin-right: 10px">
                Сброс
            </button>
        </a>
    </div>
</div>
