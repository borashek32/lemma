@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <div class="card mb-4 shadow">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <p class="text-center m-0" style="font-weight:600">
                    {{ $post->title }}
                </p>
            </li>

            <li class="list-group-item">
                @foreach($post->tags as $tag)
                    <a href="#">#{{ $tag->name }}</a>
                @endforeach
            </li>

            <li class="list-group-item w-40" style="display: flex; justify-content: center;">
                <img src="{{ url($post->img) }}" width="400px" alt="{{ $post->title }}" />
            </li>

            <li class="list-group-item">
                <p style="font-size:18px;margin:0px;">
                    Категория: {{ $post->category->name }}
                </p>

                <p style="font-size:12px;margin:0px;">
                    {{ Date::parse($post->created_at)->format('j F Y') }}
                </p>
            </li>

            <li class="list-group-item trix-content">
                <div class="trix-content">{!! $post->page_text !!}</div>
            </li>

            <li class="list-group-item trix-content">
                <p>Ссылка на источник:</p>
                <a href="{{ $post->link }}">{{ $post->link }}</a>
            </li>

            <li class="list-group-item trix-content">
                <p>Поделиться:</p>



                @include('blog.sharingbuttons')
                <?php
                showSharer("http://http://127.0.0.1:8009/auto-magazine", "Новый пост на lemma-auto.ru");
                ?>
            </li>

            <li class="list-group-item">
                @include('includes.blog.likes')
            </li>

            <li class="list-group-item">
                @comments(['model' => $post])
            </li>
        </ul>
    </div>
@endsection('content')
