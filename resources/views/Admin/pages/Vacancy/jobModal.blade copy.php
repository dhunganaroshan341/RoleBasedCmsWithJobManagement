@extends('Admin.layout.master')

@section('content')

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>{{ $job ? 'Edit Job' : 'Create Job' }}</h4>

        <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">
            ⬅ Back
        </a>
    </div>

    <form method="POST" action="{{ $job ? route('admin.jobs.update', $job->id) : route('admin.jobs.store') }}">

        @csrf
        @if($job) @method('PUT') @endif

        <div class="row mt-3">

            {{-- LEFT --}}
            <div class="col-md-8">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Job Info</h5>

                        {{-- Vacancy --}}
                        <div class="mb-3">
                            <label class="form-label">Vacancy *</label>
                            <select name="vacancy_id" class="form-select" required>
                                <option value="">Select Vacancy</option>
                                @foreach($vacancies as $vacancy)
                                <option value="{{ $vacancy->id }}" {{ old('vacancy_id', $job->vacancy_id ?? '') ==
                                    $vacancy->id ? 'selected' : '' }}>
                                    {{ $vacancy->title }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Job Title --}}
                        <div class="mb-3">
                            <label class="form-label">Job Title *</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $job->title ?? '') }}" required>
                        </div>

                        {{-- Salary --}}
                        <div class="mb-3">
                            <label class="form-label">Salary</label>
                            <input type="number" name="salary" class="form-control"
                                value="{{ old('salary', $job->salary ?? '') }}">
                        </div>

                        {{-- Total Positions --}}
                        <div class="mb-3">
                            <label class="form-label">Total Positions</label>
                            <input type="number" name="total_positions" class="form-control"
                                value="{{ old('total_positions', $job->total_positions ?? '') }}">
                        </div>

                    </div>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Gender Positions</h5>

                        {{-- Toggle --}}
                        <div class="mb-3">
                            <label class="form-label">Gender Type</label>
                            <select id="gender_type" class="form-select">
                                <option value="both">Both</option>
                                <option value="male">Male Only</option>
                                <option value="female">Female Only</option>
                            </select>
                        </div>

                        {{-- Male Positions --}}
                        <div class="mb-3 gender-field" id="male_field">
                            <label class="form-label">Male Positions</label>
                            <input type="number" name="male_positions" class="form-control"
                                value="{{ old('male_positions', $job->male_positions ?? '') }}">
                        </div>

                        {{-- Female Positions --}}
                        <div class="mb-3 gender-field" id="female_field">
                            <label class="form-label">Female Positions</label>
                            <input type="number" name="female_positions" class="form-control"
                                value="{{ old('female_positions', $job->female_positions ?? '') }}">
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success">
                                {{ $job ? 'Update' : 'Save' }}
                            </button>

                            <a href="{{ route('admin.jobs.index') }}" class="btn btn-light">
                                Cancel
                            </a>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </form>

</div>

@endsection
@push('scripts')
<script>
    function toggleGenderFields() {
        let type = document.getElementById('gender_type').value;

        if (type === 'male') {
            document.getElementById('male_field').style.display = 'block';
            document.getElementById('female_field').style.display = 'none';
        } else if (type === 'female') {
            document.getElementById('male_field').style.display = 'none';
            document.getElementById('female_field').style.display = 'block';
        } else {
            document.getElementById('male_field').style.display = 'block';
            document.getElementById('female_field').style.display = 'block';
        }
    }

    document.getElementById('gender_type').addEventListener('change', toggleGenderFields);

    // run on load
    toggleGenderFields();
</script>
@endpush