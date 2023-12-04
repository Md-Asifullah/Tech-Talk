<x-header />
<div class="container" style="margin-bottom: 5em">
    <!-- Show Notifications When Appropriate -->
    <x-notification />

    <!-- Button Group and Page Title -->



    <div class="row mt-2">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="d-flex justify-content-between">
                <div class="w-25 mt-4"><a href="{{ route('users.profile') }}" class="text-danger"
                        style="text-decoration: none"><i class="bi bi-arrow-left-square fs-5"></i> Back</a></div>
                <div class="fs-1 text-center mt-2">Change Password</div>
                <div class="fs-1 text-center mt-2 w-25"></div>
            </div>
            <div class="fs-3 text-primary text-center fw-bold">{{ auth()->user()->first_name }}
                {{ auth()->user()->last_name }}</div>
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                <!-- Current Password -->
                <div class="mb-3 mt-5">
                    <label for="exampleInputPassword1" class="form-label">Current Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="current_password"
                        required>
                </div>
                <!-- New Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" required>
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <!-- Re Enter Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>
                <div class="text-center mt-5">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('users.password') }}" class="btn btn-danger">Clear</a>
                </div>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer />
