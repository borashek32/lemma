@component('mail::message')<h3 class="text-center">
        {{ $post->title }}
        <br>
        Категория: {{ $post->category->name }}
    </h3>
    <br>
    <img src="{{ $post->img }}" alt="{{ $post->title }}">

    {!! $post->page_text !!}

    <h4>Для того, чтобы отписаться, перейдите в личный кабинет на сайте</h4>
@component('mail::button', ['url' => 'http://lemma-auto.ru/login'])
    Перейти на сайт
@endcomponent
@endcomponent
