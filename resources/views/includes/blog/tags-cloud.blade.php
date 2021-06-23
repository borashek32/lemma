<div class="text-center p-4">
    @foreach($tags as $tag)
        <a href="{{ route('tag', $tag->slug) }}">
            #{{ $tag->name }}
        </a>
    @endforeach
</div>
