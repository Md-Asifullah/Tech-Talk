<x-header />
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">Trashed Categories</div>
    <div class="col-1 mt-2"><a href="{{url()->previous()}}" class="text-success" style="text-decoration: none"><i class="bi bi-arrow-left-square fs-5"></i> Back</a></div>
    <table class="table mt-4">
        <thead>
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col" style="width: 15%">Category Name</th>
                <th scope="col" style="width: 45%">Description</th>
                
                <th scope="col" style="width: 15%">Trashed</th>
                <th scope="col" style="width: 20%"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            
            @if (count($categories) < 1)
            <tr>
                <td colspan="5">No items to display.</td>
            </tr>   
            @endif
            @foreach ($categories as $category)
                <tr>
                    <td scope="row">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                   
                    <td>{{ $category->deleted_at->diffForHumans() }}</td>
                    <td>
                      <div class="d-flex p-2"><a href="/categories/{{$category->id}}/restore" type="button"
                            class="btn btn-sm btn-outline-success me-2">Restore</a>
                            <form action="/category/{{ $category->id }}/force-delete" method="POST">
                              @csrf
                              @method('DELETE')
                        <!-- Modal Experiment Start -->
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmation{{ $category->id }}">
                            Delete Permanently
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
                                        This operation is irreverseable. Are you sure to conntinue?
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