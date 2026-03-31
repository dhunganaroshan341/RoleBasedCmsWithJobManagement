@extends('Admin.layout.master')

@section('content')

<div class="container mt-4">
    {{-- VACANCY INFO --}}
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="mb-1">{{ $vacancy->title }}</h5>
            <small>
                {{ optional($vacancy->company)->name ?? $vacancy->custom_company_name ?? '-' }}
                | {{ $vacancy->custom_company_country ?? '-' }}
            </small>
        </div>
    </div>
    {{-- HEADER --}}
    <div class="card mb-3">
        <div class="card-body d-flex justify-content-between align-items-center flex-wrap gap-2">

            {{-- LEFT --}}
            <a href="{{ route('admin.vacancies.jobs.create', $vacancy->id) }}" class="btn btn-primary">
                + Add Job
            </a>

            {{-- RIGHT SEARCH --}}
            <form method="GET" action="{{ route('admin.vacancies.jobs.index', $vacancy->id) }}"
                class="d-flex gap-2 flex-wrap align-items-center">

                <input type="text" name="search" class="form-control" style="width: 250px;"
                    placeholder="Search job title..." value="{{ request('search') }}">

                <button class="btn btn-dark">Search</button>

                <a href="{{ route('admin.vacancies.jobs.index', $vacancy->id) }}" class="btn btn-light">Reset</a>

            </form>

        </div>
    </div>



    {{-- SUCCESS --}}
    <x-session-success-table-message />

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body table-responsive">

            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Job Title</th>
                        <th>Salary</th>
                        <th>Total</th>
                        <th>Male</th>
                        <th>Female</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($jobs as $index => $job)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $job->title }}</td>

                        <td>{{ $job->salary ?? '-' }}</td>

                        <td>{{ $job->total_openings ?? '-' }}</td>

                        <td>{{ $job->male_opening ?? 0 }}</td>

                        <td>{{ $job->female_opening ?? 0 }}</td>

                        <td class="d-flex gap-1">

                            {{-- Edit --}}
                            <a href="{{ route('admin.vacancies.jobs.edit', [$vacancy->id, $job->id]) }}"
                                class="btn btn-sm text-dark" title="Edit Job">
                                <i class="bi bi-pencil-square"></i>
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('admin.vacancies.jobs.destroy', [$vacancy->id, $job->id]) }}"
                                method="POST" onsubmit="return confirm('Delete this job?')">

                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm text-danger" title="Delete Job">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">
                            No jobs found
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