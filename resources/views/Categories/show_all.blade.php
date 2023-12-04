<x-header />

<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification />

    <!-- Button Group and Page Title -->
    <div class="row">

        <div class="col-12 d-flex justify-content-center mt-2">

            <div class="btn-group" role="group" aria-label="Basic outlined example">
                <a href="/" type="button" class="btn btn-outline-primary">All</a>
                <a href="/popular-categories" type="button" class="btn btn-outline-primary">Popular</a>
                <a href="/newcategories" type="button" class="btn btn-outline-primary">New</a>
            </div>
        </div>
        <div class="fs-1 text-center mt-2">All Categories</div>

    </div>
    <!-- Category Elements -->
    <div class="row">
        @foreach ($categories as $category)
            <div class="col-sm-6 mb-sm-0 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <p class="card-text">{{ $category->description }}</p>
                        @php
                            $numberOfPosts = count($category->posts);
                        @endphp
                        @if ($numberOfPosts > 1)
                            <p class="card-text text-primary">{{ $numberOfPosts }} posts</p>
                        @else
                            <p class="card-text text-primary">{{ $numberOfPosts }} post</p>
                        @endif

                        <a href="/category/{{ $category->id }}" class="btn btn-primary">Visit Category</a>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-2">{{ $categories->links() }}</div>
    </div>
</div>
<x-footer />
