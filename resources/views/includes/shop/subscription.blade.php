<h6 class="font-weight-bold">Оформите подписку на наши новости</h6>

<form action="{{ route('mailings.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="email">
            Электронная почта
        </label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
               placeholder="myemail@gmail.com">

        <input type="submit" class="btn btn-outline-danger" value="Подписаться" style="margin-top: 10px">
    </div>
</form>
