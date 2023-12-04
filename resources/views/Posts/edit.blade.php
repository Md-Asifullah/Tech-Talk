<x-header />
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">Update {{ $post->title }} Post</div>
    <div class="row mt-5">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Post Name</label>
                            <input type="text" name="title" class="form-control" value="{{ $post->title }}"
                                required>
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <figure class="figure mt-3">
                                <img src="{{ asset($post->image) }}" class="figure-img img-fluid rounded" alt="..."
                                    width="50%">

                            </figure>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Upload Image</label>
                            <input class="form-control" type="file" id="formFile" name="image">
                            <div class="form-text">Image must be of type .jpg or .png and needs to be within 500 kb
                            </div>
                            @error('image')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Select -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select Category</label>
                            <select class="form-select" aria-label="Default select example" name="category_id"
                                value="{{ old('category_id') }}" required>
                                @foreach ($categories as $category)
                                    @if ($post->category_id == $category->id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @endif
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="10" required>{{ $post->description }}</textarea>

                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="/posts/{{ $post->id }}/edit" class="btn btn-danger">Reset</a>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-2"></div>
    </div>
</div>

<x-footer />
