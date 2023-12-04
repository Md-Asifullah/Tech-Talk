<x-header/>
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">Create a New Post</div>
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Post Name</label>
                  <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
                </div>
                <div class="mb-3">
                  <label for="formFile" class="form-label">Upload Image</label>
                  <input class="form-control" type="file" id="formFile" name="image">
                  <div class="form-text">Image must be of type .jpg or .png and needs to be within 500 kb</div>
                  @error('image')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <!-- Select -->
                <div class="mb-3">
                <label for="formFile" class="form-label">Select Category</label>
                <select class="form-select" aria-label="Default select example" name="category_id" value="{{old('category_id')}}" required>
                  @foreach ($categories as $category)
                  @if (old('category_id') == $category -> id)
                  <option value="{{$category -> id}}" selected>{{$category -> name}}</option>
                  @endif
                  <option value="{{$category -> id}}">{{$category -> name}}</option>
                  @endforeach
                </select>
                @error('category_id')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
              </div>
                <!-- Description -->
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="10" required>{{old('description')}}</textarea>
                    
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts/create" class="btn btn-danger">Clear</a>
              </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer/>