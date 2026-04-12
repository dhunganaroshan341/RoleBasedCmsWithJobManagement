@extends('Admin.layout.master')

@section('content')

@php
$vacancies = \App\Models\Vacancy::withCount('jobs')
->with('company')
->when(request('search'), function($query) {
$query->where('title', 'like', '%' . request('search') . '%');
})
->latest()
->get();
@endphp

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">

            {{-- LEFT --}}
            <a href="#" class="btn btn-dark">
                Job Applications
            </a>

            {{-- RIGHT SEARCH --}}
            <form method="GET" action="{{ route('admin.vacancies.index') }}"
                class="d-flex gap-2 flex-wrap align-items-center">

                <input type="text" name="search" class="form-control" style="width: 250px;"
                    placeholder="Search by title..." value="{{ request('search') }}">

                <button class="btn btn-dark">Search</button>

                <a href="{{ route('admin.vacancies.index') }}" class="btn btn-light">Reset</a>

            </form>

        </div>
    </div>

    {{-- SUCCESS MESSAGE --}}
    <x-session-success-table-message />

    {{-- TABLE CARD --}}
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Company</th>
                        <th>Country</th>
                        <th>Interview Date</th>
                        <th>Status</th>
                        <th>Jobs</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($vacancies as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>
                            <img src="{{ asset( $item->vacancy_image) }}" width="50" class="rounded"
                                onerror="this.src='{{ asset('user.png') }}'">
                        </td>

                        <td>{{ $item->title }}</td>

                        <td>
                            {{ optional($item->company)->name ?? $item->custom_company_name ?? '-' }}
                        </td>

                        <td>{{ $item->custom_company_country ?? '-' }}</td>

                        <td>{{ $item->interview_date ?? '-' }}</td>

                        <td>
                            @if($item->status === 'active')
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-danger">Inactive</span>
                            @endif
                        </td>

                        <td>{{ $item->jobs_count }}</td>

                        <td class="d-flex gap-1">

                            {{-- View Jobs --}}
                            <a href="{{ route('admin.vacancies.jobs.index', ['vacancy' => $item->id]) }}"
                                class="btn btn-sm btn-light" title="View Jobs">
                                <i class="bi bi-briefcase"></i>
                            </a>

                            {{-- Add Job --}}
                            <a href="{{ route('admin.vacancies.jobs.create', ['vacancy' => $item->id]) }}"
                                class="btn btn-sm btn-info" title="Add Job">
                                <i class="bi bi-plus-circle"></i>
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('admin.vacancies.edit', $item->id) }}" class="btn btn-sm btn-dark"
                                title="Edit Vacancy">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.vacancies.destroy', $item->id) }}" method="POST"
                                onsubmit="return confirm('Delete this vacancy?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger" title="Delete Vacancy">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            No vacancies found
                        </td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>
    </div>

</div>

@endsection
@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
@endpush