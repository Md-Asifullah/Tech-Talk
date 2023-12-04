<div class="card mt-3 border border-2 border-primary border-opacity-50"
    style="box-shadow:  5px 5px 14px #e6e6e6,
-5px -5px 14px #ffffff;">
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="d-flex align-items-start">
                    <div class="flex-shrink-0">
                        <img src="{{ '/' . $comment->user->image }}" class="rounded-circle" style="width:4em;height:4em">
                    </div>
                    <div class="flex-grow-1 ms-3">

                        <div class="d-flex align-items-end">
                            <div class="fw-semibold" style="font-size:1.5em; margin:0">
                                {{ $comment->user->first_name . ' ' . $comment->user->last_name }}</div>
                            <div class="ps-3" style="margin:4px; font-size:0.9em; font-weight: 400; color: #8a8a8a">
                                {{ $comment->created_at->diffForHumans() }}</div>
                            @if (Auth::check())
                                @if (
                                    (Auth::check() && $comment->user->id == auth()->user()->id) ||
                                        auth()->user()->can('manage all likes and comments'))
                                    {{-- Use a modal to complete this action --}}
                                    <div class="ms-auto">
                                        <form action="/comment/{{ $comment->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                                data-bs-target="#editComment{{ $comment->id }}">
                                                <i class="bi bi-pencil-square text-primary"></i>
                                            </button>
                                            <button class="btn btn-outline-light" type="submit"><i
                                                    class="bi bi-trash text-danger"></i></button>
                                        </form>

                                    </div>
                                @endif
                            @endif

                        </div>
                        <p class="card-text mt-2">{{ $comment->text }}</p>
                    </div>
                    <!-- Edit Comment Modal -->


                    <!-- Modal -->
                    <div class="modal fade" id="editComment{{ $comment->id }}" tabindex="-1"
                        aria-labelledby="editCommentLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="/comment/update/{{ $comment->id }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="editCommentLabel">Edit Your Comment</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3">{{ $comment->text }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
