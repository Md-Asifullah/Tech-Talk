<x-header />
<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification />

    <!-- Button Group and Page Title -->
    <div class="fs-1 text-center mt-2">Profile</div>
    <div class="row mt-2">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="fs-3 text-primary text-center fw-bold">{{ auth()->user()->first_name }}
                {{ auth()->user()->last_name }}</div>
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mt-4">
                    <div class="col-6 text-center"><img src="{{ asset(auth()->user()->image) }}" width="150px"
                            class="rounded-circle" alt=""></div>
                    <div class="col-6"><label for="formFile" class="form-label">Upload Image</label>
                        <input class="form-control" type="file" id="formFile" name="image">
                        <div class="form-text">Image must be of type .jpg or .png and needs to be within 500 kb</div>
                        @error('image')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <div class="form-check form-switch mt-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                                name="no_profile_pic">
                            <label class="form-check-label text-secondary" for="flexSwitchCheckDefault">Do not use any
                                profile picture</label>
                        </div>
                    </div>
                </div>
                <!-- Name -->
                <div class="row mb-3 mt-3">
                    <div class="col">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control"
                            value="{{ auth()->user()->first_name }}" required>
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control"
                            value="{{ auth()->user()->last_name }}" required>
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}"
                        required>
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('users.profile') }}" class="btn btn-danger">Clear</a>
                    <a href="{{ route('users.password') }}" class="btn btn-outline-danger">Change Password</a>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer />
