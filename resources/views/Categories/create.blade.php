<x-header/>
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">Create a New Category</div>
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="/categories/create">
                @csrf
                <div class="mb-3">
                  <label for="exampleInputEmail1" class="form-label">Category Name</label>
                  <input type="text" name="name" class="form-control" required>
                  @error('name')
                  <p class="text-danger">{{$message}}</p>
                  @enderror
                  
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                    <div class="form-text" required>Please enter a short description within 200 characters.</div>
                    @error('description')
                    <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/categories/create" class="btn btn-danger">Clear</a>
              </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer/>