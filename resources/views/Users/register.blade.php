<x-header />
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-4">User Registration</div>
    <div class="row mt-3">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
                @csrf
                <!-- Name -->
                <div class="row mb-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="{{ old('first_name') }}"
                            required>
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="{{ old('last_name') }}"
                            required>
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ old('password') }}" required>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Re Enter Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control"
                        value="{{ old('password') }}" required>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Image -->
                <div class="mb-3">
                    <label for="formFile" class="form-label">Upload Your Image / Avatar</label>
                    <input class="form-control" type="file" id="formFile" name="image">
                    <div class="form-text">Image must be of type .jpg or .png and needs to be within 500 kb</div>
                    @error('image')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="/posts/create" class="btn btn-danger">Clear</a>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer />
