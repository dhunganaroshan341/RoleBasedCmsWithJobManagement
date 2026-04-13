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
            <a href="{{ route('admin.vacancies.jobs.create', $vacancy->id) }}" class="btn btn-dark">
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

            <table class="table table-striped table-bordered align-middle">
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

                        <td class="text-center">

                            <div class="dropdown d-inline-block">

                                {{-- 3 dots button --}}
                                <button class="btn p-0 m-0 bg-transparent border-0" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>

                                {{-- dropdown menu --}}
                                <ul class="dropdown-menu dropdown-menu-end">

                                    {{-- Edit --}}
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.vacancies.jobs.edit', [$vacancy->id, $job->id]) }}">
                                            <i class="fas fa-edit me-2"></i> Edit
                                        </a>
                                    </li>

                                    {{-- Delete --}}
                                    <li>
                                        <form
                                            action="{{ route('admin.vacancies.jobs.destroy', [$vacancy->id, $job->id]) }}"
                                            method="POST" onsubmit="return confirm('Delete this job?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="dropdown-item text-danger">
                                                <i class="fas fa-trash me-2"></i> Delete
                                            </button>

                                        </form>
                                    </li>

                                </ul>

                            </div>

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