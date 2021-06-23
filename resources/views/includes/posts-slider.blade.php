<div>
    @foreach($lastPosts as $lastPost)
        <a href="{{ route('post', $lastPost->slug) }}">
            <img src="{{ $lastPost->img }}" class="d-block w-100" alt="{{ $lastPost->title }}">
            <div class="">
                <p class="text-white text-right text-xs">{{ Date::parse($lastPost->created_at)->format('j F Y') }}
                    <br>
                {{ $lastPost->title }}</p>
            </div>
        </a>
    @endforeach
</div>
