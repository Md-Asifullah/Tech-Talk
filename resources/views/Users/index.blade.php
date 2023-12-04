<x-header class="light-dark-bg" />
<div class="container" style="margin-bottom: 5em">
    <div class="fs-1 text-center mt-2">Members</div>
    <div class="row justify-content-md-center">
        @foreach ($users as $user)
            <div class="col-lg-3 col-md-3 col-xs-3 card m-3 shadow p-3  border border-0">
                <div class="card-body text-center">
                    <img src="{{ $user->image }}" width="120px" class="rounded-circle mt-3 mb-4" alt="">
                    <h2 class="member-name">{{ $user->first_name }} {{ $user->last_name }}</h2>
                    @if ($user->getRoleNames()->first() == 'admin')
                        <p class="member-info fw-bold text-danger">{{ ucfirst($user->getRoleNames()->first()) }}</p>
                    @else
                        <p class="member-info fw-semibold text-success">{{ ucfirst($user->getRoleNames()->first()) }}</p>
                    @endif

                    <p class="member-info">{{ $user->email }}</p>
                    <p class="member-info text-success">{{ $user->posts->count() }} Posts Created</p>
                    <p class="member-info">Member since: {{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        @endforeach

    </div>
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <div class="mt-2">{{ $users->links() }}</div>
        </div>
        <div class="col-4"></div>
    </div>

</div>
<x-footer />
