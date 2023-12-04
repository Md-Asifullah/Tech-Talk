<x-header />
<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification/>
    <div class="fs-1 text-center mt-4">Trashed Posts</div>
    
    <div class="col-1 mt-2"><a href="/posts/manage" class="text-success" style="text-decoration: none"><i class="bi bi-arrow-left-square fs-5"></i> Back</a></div>
    <table class="table mt-2">
        <thead>
            <tr>
                <th scope="col" style="width: 5%">#</th>
                <th scope="col" style="width: 25%">Post Name</th>
                <th scope="col" style="width: 15%">
                    Category
                </th>
                <th scope="col" style="width: 5%"><i class="fs-5 bi bi-hand-thumbs-up-fill text-primary"></i></th>
                <th scope="col" style="width: 5%"><i class="fs-5 bi bi-chat-left-text-fill text-primary"></i></th>
                <th scope="col" style="width: 10%">Trashed</th>
                <th scope="col" style="width: 15%"></th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @if (count($posts) < 1)
            <tr>
                <td colspan="5">No items to display.</td>
            </tr>   
            @endif
            @foreach ($posts as $post)
            
                <tr>
                    
                    <td scope="row">{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    {{-- <td>{{ $post->category->name }}</td> --}}
                    {{-- <td>{{ $post->category_id }}</td> --}}
                    {{-- <td>{{$post}}</td> --}}

                    @if (isset($post->category->name))
                    <td class="text-success"><i class="bi bi-capslock-fill"></i> {{ $post->category->name }}</td>
                    @else
                        @php
                            $categoryName = "Trashed Category";
                            foreach ($trashedCategories as $trashedCategory) {
                                if($trashedCategory->id == $post->category_id){
                                    $categoryName = $trashedCategory->name;
                                }
                            }
                        @endphp
                        <td class="text-danger"><i class="bi bi-trash"></i> {{$categoryName}}</td>
                    @endif
                    
                    @php
                        $likes = count($post->likes);
                    @endphp
                    <td>{{ $likes }}</td>
                    <td>{{ 0 }}</td>
                    <td>{{ $post->deleted_at->diffForHumans() }}</td>
                    <td>
                        <div class="d-flex p-2">
                            @if (isset($post->category->name))
                                <a href="/posts/{{$post->id}}/restore" type="button"
                                class="btn btn-sm btn-outline-success me-2">Restore</a>
                            @else
                            <button type="button" class="btn btn-sm btn-outline-success me-2" disabled>Restore</button>
                             @endif
                            
                            
                            <form action="/posts/{{$post->id}}/force-delete" method="POST">
                              @csrf
                              @method('DELETE')
                        <!-- Modal Experiment Start -->
                        <!-- Button trigger modal -->
                        <button type="submit" class="btn btn-sm btn-danger">
                            Delete Permanently
                        </button></div>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="mt-2">{{$posts->links()}}</div>
</div>
<x-footer />