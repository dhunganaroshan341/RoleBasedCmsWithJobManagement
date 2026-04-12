@php
$route = request()->path();
$user = Auth::user();
@endphp

<div class="card mb-3 shadow-sm">
    <div class="row justify-around card-body">

        <div class="col-6">
            <h3 class="mb-3">
                {{ ucwords(str_replace('/', ' > ', $route)) }}
            </h3>
        </div>

        <div class="col-6 text-end">

            {{-- 🔥 SMART CONDITIONAL HEADER --}}
            @if(request()->is('admin/dashboard'))
            <h5>Welcome back, {{ $user->full_name }} 👋</h5>
            <small class="text-muted">Here’s your system overview</small>

            @elseif(request()->is('admin/user*'))
            <h5>User Management</h5>
            <small class="text-muted">Manage system users</small>

            @elseif(request()->is('jobs*'))
            <h5>Job Portal</h5>
            <small class="text-muted">Vacancies, jobs & applications</small>

            @else
            <h5>Hello, {{ $user->full_name }}</h5>
            @endif

        </div>
    </div>
</div>