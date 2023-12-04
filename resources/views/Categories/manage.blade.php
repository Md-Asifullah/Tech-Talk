<x-header />
<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification/>
    <div class="fs-1 text-center mt-4">Manage Categories</div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col" style="width: 15%">Category Name</th>
                <th scope="col" style="width: 45%">Description</th>
                <th scope="col" style="width: 10%">Posts</th>
                <th scope="col" style="width: 10%">Created</th>
                <th scope="col" style="width: 15%"><a href="/categories/trash" class="btn btn-sm btn-warning">Trashed Categories</a></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $category->id }}</td>
                    <td><a href="/category/{{$category->id}}" class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover">{{ $category->name }}</a></td>
                    <td>{{ $category->description }}</td>
                    @php
                        $numberOfPosts = count($category->posts);
                    @endphp
                    @if ($numberOfPosts > 1)
                    <td>{{$numberOfPosts}} posts</td>
                    @else
                    <td>{{$numberOfPosts}} post</td>  
                    @endif
                    <td>{{ $category->created_at->diffForHumans() }}</td>
                    <td>
                      <div class="d-flex p-2"><a href="/category/{{ $category->id }}/edit" type="button"
                            class="btn btn-sm btn-outline-success me-2">Edit</a>
                            <form action="/category/{{ $category->id }}" method="POST">
                              @csrf
                              @method('DELETE')
                        <!-- Modal Experiment Start -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmation{{ $category->id }}">
                            Delete
                        </button></div>

                        <!-- Modal -->
                        <div class="modal fade" id="deleteConfirmation{{ $category->id }}" tabindex="-1" aria-labelledby="deleteConfirmationLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h1 class="modal-title fs-5" id="deleteConfirmationLabel">Are you sure?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Deleting category will also delete the posts, comments and likes associated with the category.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                            
                                              <button type="submit" class="btn btn-danger">Delete</button>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                      </form>
                        <!-- Modal Experiment End -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">{{$categories->links()}}</div>
</div>
<x-footer />