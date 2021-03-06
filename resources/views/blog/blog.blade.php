@extends('layouts.blog')
@section('title-block')Автожурнал@endsection('title-block')
@section('content')
    <div class="card shadow bg-body rounded" style="padding: 15px;">
        <h3 style="margin-bottom: 40px;text-align: center">Автожурнал - блог обо всем</h3>

        <div class="row">
            @forelse($posts as $post)
                @include('includes.blog.card-post')
            @empty
                <p class="text-center" style="margin-left: 6px">
                    Ничего не найдено по вашему запросу <strong>{{ request()->query('search') }}</strong>
                </p>
            @endforelse
        </div>
        <div style="display: flex;justify-content: center">
            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
@endsection('content')
