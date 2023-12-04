@php
    $likes = count($post->likes);
    $comments = count($post->comments);
    $userLiked = false;
    if (Auth::check()) {
        foreach ($post->likes as $like) {
            if ($like->user_id == auth()->user()->id) {
                $userLiked = true;
            }
        }
    }

@endphp

<a href="/posts/{{ $post->id }}" class="list-group-item list-group-item-action" aria-current="true" style="z-index: 1">
    <div class="d-flex w-100 justify-content-between">
        <h5 class="mb-1 mt-3">{{ $post->title }}</h5>
        <small>{{ $post->created_at->diffForHumans() }}</small>
    </div>
    <p class="mb-1">
        {{ implode(' ', array_slice(explode(' ', $post->description), 0, 50)) }}...</p>

    @if ($likes > 1 && $userLiked)
        <span class="text-secondary" style="font-size: .9em">You and {{ $likes - 1 }} others
            like the post</span>
    @elseif ($likes > 1 && !$userLiked)
        <span class="text-secondary" style="font-size: .9em">{{ $likes }} Likes</span>
    @elseif ($likes == 1 && $userLiked)
        <span class="text-secondary" style="font-size: .9em">You like the post</span>
    @elseif ($likes == 1 && !$userLiked)
        <span class="text-secondary" style="font-size: .9em">{{ $likes }} Like</span>
    @endif

    @if ($likes > 0 && $comments > 0)
        <span class="text-secondary ms-2 me-2" style="font-size: .9em"> |</span>
    @endif

    @if ($comments > 1)
        <span class="text-secondary" style="font-size: .9em"> {{ $comments }} Comments</span>
    @elseif ($comments == 1)
        <span class="text-secondary" style="font-size: .9em"> {{ $comments }} Comment</span>
    @endif



    @if (Auth::check())
        <hr />

        <div class="btn-group btn-group-sm" role="group" aria-label="Small button group" style="z-index: 5">
            @if ($userLiked)
                <form action="/unlike/{{ $post->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger"><i class="bi bi-hand-thumbs-up-fill"></i>
                        Unlike
                        this post</button>
                </form>
            @else
                <form action="/like/{{ $post->id }}" method="GET">
                    <button type="submit" class="btn btn-outline-primary" onclick="addLike()"><i
                            class="bi bi-hand-thumbs-up-fill"></i> Like this post</button>
                </form>
            @endif
        </div>
    @endif

</a>
