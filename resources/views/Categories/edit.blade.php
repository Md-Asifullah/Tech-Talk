<x-header/>
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">Update {{$category->name}} Category</div>
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
            <form action="/category/{{$category->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="text" name="name" class="form-control" required value="{{$category->name}}">
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{$category->description}}</textarea>
                    <div class="form-text" required>Please enter a short description within 200 characters.</div>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/category/{{$category->id}}/edit" class="btn btn-danger">Reset</a>
              </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>
<x-footer/>