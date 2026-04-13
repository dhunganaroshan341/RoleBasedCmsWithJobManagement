@extends('Admin.layout.master')

@section('content')

<div class="container mt-4">
    {{-- HEADER --}}
    @push('breadcrumb')
    <h4>{{ $job ? 'Edit Job' : 'Create Job' }}</h4>

    @endpush
    @push('button')
    <a href="{{ route('admin.vacancies.jobs.index', $vacancy->id ?? 1) }}" class="btn btn-dark">
        <i class="fas fa-arrow-left me-1"></i> Back
    </a>
    @endpush

    @include('components.admin-bread-crumb-empty-slot')
    <x-session-message />

    <form method="POST" action="{{ $job 
            ? route('admin.vacancies.jobs.update', [$vacancy->id, $job->id]) 
            : route('admin.vacancies.jobs.store', $vacancy->id ?? '') }}">

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
                                @foreach(\App\Models\Vacancy::latest()->get() as $v)
                                <option value="{{ $v->id }}" {{ old('vacancy_id', $job->vacancy_id ?? $vacancy->id ??
                                    '') == $v->id ? 'selected' : '' }}>
                                    {{ $v->title }} - {{ $v->custom_company_name ?? optional($v->company)->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Title --}}
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

                    </div>
                </div>
            </div>

            {{-- RIGHT --}}
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Openings</h5>

                        {{-- Mode --}}
                        <div class="mb-3">
                            <label class="form-label">Openings Mode</label>
                            <select id="openingsMode" class="form-select">
                                <option value="total">Total</option>
                                <option value="split">Male & Female</option>
                            </select>
                        </div>

                        {{-- Total --}}
                        <div class="mb-3" id="totalWrapper">
                            <label class="form-label">Total Positions</label>
                            <input type="number" name="total_openings" class="form-control"
                                value="{{ old('total_openings', $job->total_openings ?? '') }}">
                        </div>

                        {{-- Male Female --}}
                        <div class="d-none" id="splitWrapper">
                            <div class="mb-3">
                                <label class="form-label">Male Positions</label>
                                <input type="number" name="male_opening" class="form-control"
                                    value="{{ old('male_opening', $job->male_opening ?? '') }}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Female Positions</label>
                                <input type="number" name="female_opening" class="form-control"
                                    value="{{ old('female_opening', $job->female_opening ?? '') }}">
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button class="btn btn-success">
                                {{ $job ? 'Update' : 'Save' }}
                            </button>

                            <a href="{{ route('admin.vacancies.jobs.index', $vacancy->id ?? 1) }}"
                                class="btn btn-light">
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
    const mode = document.getElementById('openingsMode');
    const total = document.getElementById('totalWrapper');
    const split = document.getElementById('splitWrapper');

    const totalInput = document.querySelector('[name="total_openings"]');
    const maleInput = document.querySelector('[name="male_opening"]');
    const femaleInput = document.querySelector('[name="female_opening"]');

    function toggleMode() {
        if (mode.value === 'split') {
            total.classList.add('d-none');
            split.classList.remove('d-none');

            // clear total to avoid conflict
            totalInput.value = '';
        } else {
            total.classList.remove('d-none');
            split.classList.add('d-none');

            // clear male/female
            maleInput.value = '';
            femaleInput.value = '';
        }
    }

    // 🔥 Auto-calc total when using split
    function autoCalculateTotal() {
        if (mode.value === 'split') {
            const male = parseInt(maleInput.value) || 0;
            const female = parseInt(femaleInput.value) || 0;
            totalInput.value = male + female;
        }
    }

    maleInput.addEventListener('input', autoCalculateTotal);
    femaleInput.addEventListener('input', autoCalculateTotal);

    mode.addEventListener('change', toggleMode);

    // run on load (IMPORTANT for edit)
    toggleMode();
</script>
@endpush