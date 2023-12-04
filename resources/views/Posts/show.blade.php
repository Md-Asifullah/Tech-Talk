<x-header />
<div class="container mt-2" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification />
    <div class="row">
        <div class="col-12 mt-3 mb-3">
            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb ">
                <ol class="breadcrumb">
                    <li class="text-secondary">You are here: </li>
                    <li class="breadcrumb-item ms-2"><a href="/"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover"><i
                                class="bi bi-house-door-fill"></i></a></li>
                    <li class="breadcrumb-item"><a href="/"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Categories</a>
                    </li>
                    <li class="breadcrumb-item"><a href="/category/{{ $category->id }}"
                            class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">{{ $category->name }}</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row">
        <div class="col-3">
            <ul class="list-group">
                <li class="list-group-item disabled bg-success text-light" aria-disabled="true">Categories</li>

                @foreach ($categories as $indivudualCategory)
                    @if ($indivudualCategory->id == $category->id)
                        <li class="list-group-item list-group-item-action list-group-item-success active"><span
                                class="link-light" style="text-decoration: none">{{ $indivudualCategory->name }}</span>
                            <div class="ms-4" style="font-size: 0.9em">
                                @foreach ($relatedPosts as $relatedPost)
                                    <div class="container mt-1">
                                        <div class="row">
                                            <div class="col-1">
                                                <i class="bi bi-sticky"></i>
                                            </div>
                                            <div class="col-10">
                                                <a href="/posts/{{ $relatedPost->id }}"
                                                    style="text-decoration: none; color:#6fbc99">{{ $relatedPost->title }}</a>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </li>
                    @else
                        <li class="list-group-item list-group-item-action list-group-item-success"><a
                                href="/category/{{ $indivudualCategory->id }}" class="link-success"
                                style="text-decoration: none">{{ $indivudualCategory->name }}</a></li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-9">
            <div class="card text-center">
                <div class="card-header">

                    <div class="row text-secondary">
                        <div class="col-1"><a href="{{ url()->previous() }}" class="text-danger"
                                style="text-decoration: none"><i class="bi bi-arrow-left-square fs-5"></i> Back</a>
                        </div>
                        <div class="col-4 align-self-center">By {{ $author }}</div>
                        <div class="col-4 align-self-center">{{ $total_views }} Total Views</div>
                        <div class="col-3 align-self-center">Post Created on
                            {{ date_format($post->created_at, 'd/m/Y') }}</div>
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <span
                        class="badge bg-success bg-gradient rounded-pill text-bg-success fw-light fs-6">{{ $category->name }}</span>
                    <figure class="figure mt-3">
                        <img src="{{ asset($post->image) }}" class="figure-img img-fluid rounded" alt="..."
                            width="50%">

                    </figure>
                    <p class="card-text text-start">{{ $post->description }}</p>
                    <!-- Likes Comments Stats -->
                    <div class="text-start">
                        @php
                            $likes = count($post->likes);
                            $comments = count($post->comments);
                        @endphp
                        @if ($likes > 1 && $likeStatus)
                            <span class="text-secondary" style="font-size: .9em">You and {{ $likes - 1 }} others
                                like the post</span>
                        @elseif ($likes > 1 && $likeStatus == 0)
                            <span class="text-secondary" style="font-size: .9em">{{ $likes }} Likes</span>
                        @elseif ($likes == 1 && $likeStatus)
                            <span class="text-secondary" style="font-size: .9em">You like the post</span>
                        @elseif ($likes == 1 && $likeStatus == 0)
                            <span class="text-secondary" style="font-size: .9em">{{ $likes }} Like</span>
                        @endif

                        @if ($likes > 0 && $comments > 0)
                            <span class="text-secondary ms-2 me-2" style="font-size: .9em"> |</span>
                        @endif

                        @if ($comments > 1)
                            <span class="text-secondary" style="font-size: .9em"> {{ $comments }}
                                Comments</span>
                        @elseif ($comments == 1)
                            <span class="text-secondary" style="font-size: .9em"> {{ $comments }}
                                Comment</span>
                        @endif


                        @if (Auth::check())
                            <hr />
                            <div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
                                @if (!$likeStatus)
                                    <a type="submit" href="/like/{{ $post->id }}"
                                        class="btn btn-sm btn-outline-primary" disabled><i
                                            class="bi bi-hand-thumbs-up-fill"></i> Like
                                        this post</a>
                                @else
                                    <form action="/unlike/{{ $post->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                class="bi bi-hand-thumbs-up-fill"></i> Unlike
                                            this post</button>
                                    </form>
                                @endif
                            </div>
                        @endif



                    </div>
                </div>
            </div>
            <!-- Comments Title -->
            @if ($comments == 1)
                <div class="fs-2 text-primary fw-semibold">1 comment</div>
            @elseif ($comments > 1)
                <div class="fs-2 text-primary fw-semibold">{{ $comments }} comments</div>
            @endif

            {{-- @foreach ($post->comments as $comment)
                <x-comment :comment="$comment" />
            @endforeach --}}
            @foreach ($postComments as $comment)
                <x-comment :comment="$comment" />
            @endforeach

            <div class="mt-4">
                {{ $postComments->links() }}
            </div>


            <!-- Add Comment -->
            @if (Auth::check())
                <form action="/comment" method="POST">
                    @csrf
                    <div class="card mt-3 ">
                        <div class="card-header bg-success text-light">Add Comment</div>
                        <div class="card-body">

                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Write your comment</label>
                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('text')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <div class="col-12">
                                <button type="submit" class="btn btn-sm btn-primary">Post your comment</button>
                            </div>
                        </div>
                    </div>
                </form>
            @endif
        </div>

    </div>
</div>
<x-footer />
