<!-- Category Created and Updated -->

@if (session()->has('success'))
        <div class="row">
            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

<!-- Category Deleted -->

@if (session()->has('delete'))
        <div class="row">
            <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                {{ session('delete') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif