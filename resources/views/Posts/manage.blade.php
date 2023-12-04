<x-header />
<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification />
    <div class="fs-1 text-center mt-4">Manage Posts</div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col" style="width: 35%">Post Name</th>
                <th scope="col" style="width: 10%">Author</th>
                <th scope="col" style="width: 15%">
                    <form action="/posts/manage-specific-category" method="GET">
                        @csrf
                        <div class="input-group input-group-sm">

                            <select class="form-select form-select-sm" id="inputGroupSelect04"
                                aria-label="Example select with button addon" name="category_id">
                                <option value="all"selected>All Categories</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-outline-secondary" type="submit">Go</button>

                        </div>
                    </form>
                </th>
                <th scope="col" style="width: 5%"><i class="fs-5 bi bi-hand-thumbs-up-fill text-primary"></i></th>
                <th scope="col" style="width: 5%"><i class="fs-5 bi bi-chat-left-text-fill text-primary"></i></th>
                <th scope="col" style="width: 10%">Created</th>
                <th scope="col" style="width: 15%"><a href="/posts/trash" class="btn btn-sm btn-warning">Trashed
                        Posts</a></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (count($posts) < 1)
                <tr>
                    <td colspan="5">No posts has been created yet.</td>
                </tr>
            @endif
            @foreach ($posts as $post)
                <tr>
                    <td scope="row">{{ $post->id }}</td>
                    <td><a href="/posts/{{ $post->id }}"
                            class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ $post->title }}</a>
                    </td>
                    <td>{{ $post->user->first_name }} {{ $post->user->last_name }}</td>
                    <td>{{ $post->category->name }}</td>
                    @php
                        $likes = count($post->likes);
                    @endphp
                    <td>{{ $likes }}</td>
                    @php
                        $comments = count($post->comments);
                    @endphp
                    <td>{{ $comments }}</td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex p-2"><a href="/posts/{{ $post->id }}/edit" type="button"
                                class="btn btn-sm btn-outline-success me-2">Edit</a>
                            <form action="/posts/{{ $post->id }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-outline-danger">
                                    Delete
                                </button>
                        </div>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">{{ $posts->links() }}</div>
</div>
<x-footer />
