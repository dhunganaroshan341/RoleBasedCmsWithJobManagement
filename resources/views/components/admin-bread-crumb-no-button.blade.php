@php
$user = Auth::user();
$route = request()->path();
@endphp
<div class="card mb-3 shadow-sm">
    <div class="row card-body">

        {{-- LEFT: Breadcrumb --}}
        <div class="col-6">
            @if(request()->is('admin/dashboard'))

            <small class="mb-0">
                {{ ucwords(str_replace('/', ' > ', $route)) }}
            </small>
            @else
            <small class="mb-0">
                {{ ucwords(str_replace('/', ' > ', $route)) }}
            </small>
            @endif
        </div>
        @if(request()->is('admin/dashboard'))
        {{-- RIGHT: Greeting --}}
        <div class="col-6 text-end">

            <h5>
                {{ $greetingService->getEmoji() }}
                {{ $greetingService->getGreeting() }},
                {{ $user->full_name }} 👋
            </h5>

            <small class="text-muted">
                {{ $greetingService->getTagline() }}
            </small>

            <br>

            <small class="text-danger">
                {{ $greetingService->getInternationalLine() }}
            </small>

        </div>
        @endif

    </div>
</div>