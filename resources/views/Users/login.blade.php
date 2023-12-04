<x-header />
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-5">Log in</div>
    <div class="row mt-5">
        <div class="col-3"></div>
        <div class="col-6">
            <form method="POST" action="{{ route('users.authenticate') }}">
                @csrf
                <!-- Name -->
                <div class="row mb-3">
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
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="/login" class="btn btn-danger">Clear</a>
            </form>
        </div>
        <div class="col-3"></div>
    </div>
</div>

<x-footer />
