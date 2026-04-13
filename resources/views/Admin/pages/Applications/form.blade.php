@extends('Admin.layout.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/css/tom-select.css" rel="stylesheet">
@endpush

@section('content')

<div class="container mt-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>
            {{ $vacancy ? 'Edit Vacancy' : 'Create Vacancy' }}
        </h4>

        <a href="{{ route('admin.vacancies.index') }}" class="btn btn-dark">
            <i class="fas fa-arrow-left me-1"></i> Back
        </a>
    </div>
    <x-session-message />

    <form method="POST"
        action="{{ $vacancy ? route('admin.vacancies.update', $vacancy->id) : route('admin.vacancies.store') }}"
        enctype="multipart/form-data">

        @csrf
        @if($vacancy) @method('PUT') @endif

        <div class="row mt-3">

            {{-- LEFT SIDE --}}
            <div class="col-md-8">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Basic Info</h5>

                        <div class="row">
                            <div class="mb-3 col-md-4">
                                <label class="form-label">Title *</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $vacancy->title ?? '') }}" required>
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="custom_company_name" class="form-control"
                                    value="{{ old('custom_company_name', $vacancy->custom_company_name ?? '') }}">
                            </div>

                            <div class="mb-3 col-md-4">
                                <label class="form-label">Country</label>
                                <input type="text" name="custom_company_country" class="form-control"
                                    value="{{ old('custom_company_country', $vacancy->custom_company_country ?? '') }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Categories</label>

                            <select id="categories" name="category_ids[]" multiple placeholder="Select categories...">
                                @foreach ($categorys as $category)
                                <option value="{{ $category->id }}" {{ $vacancy?->categories?->contains($category->id) ?
                                    'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">General Requirements</label>
                            <textarea id="general_requirements" name="general_requirements" class="form-control"
                                rows="4">{{ old('general_requirements', $vacancy->general_requirements ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control"
                                rows="6">{{ old('description', $vacancy->description ?? '') }}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            {{-- RIGHT SIDE --}}
            <div class="col-md-4">
                <div class="card shadow-sm mb-3">
                    <div class="card-body">

                        <h5 class="mb-3">Settings</h5>

                        <div class="mb-3">
                            <label class="form-label">Currency</label>

                            <select name="currency" class="form-select">

                                <option value="USD" {{ old('currency', $vacancy->currency ?? '') == 'USD' ? 'selected' :
                                    '' }}>USD - US Dollar</option>
                                <option value="EUR" {{ old('currency', $vacancy->currency ?? '') == 'EUR' ? 'selected' :
                                    '' }}>EUR - Euro</option>
                                <option value="GBP" {{ old('currency', $vacancy->currency ?? '') == 'GBP' ? 'selected' :
                                    '' }}>GBP - British Pound</option>
                                <option value="CAD" {{ old('currency', $vacancy->currency ?? '') == 'CAD' ? 'selected' :
                                    '' }}>CAD - Canadian Dollar</option>
                                <option value="AUD" {{ old('currency', $vacancy->currency ?? '') == 'AUD' ? 'selected' :
                                    '' }}>AUD - Australian Dollar</option>

                                <option value="JPY" {{ old('currency', $vacancy->currency ?? '') == 'JPY' ? 'selected' :
                                    '' }}>JPY - Japanese Yen</option>
                                <option value="CNY" {{ old('currency', $vacancy->currency ?? '') == 'CNY' ? 'selected' :
                                    '' }}>CNY - Chinese Yuan</option>
                                <option value="INR" {{ old('currency', $vacancy->currency ?? '') == 'INR' ? 'selected' :
                                    '' }}>INR - Indian Rupee</option>
                                <option value="NPR" {{ old('currency', $vacancy->currency ?? '') == 'NPR' ? 'selected' :
                                    '' }}>NPR - Nepalese Rupee</option>

                                {{-- 🌍 Gulf currencies --}}
                                <option value="AED" {{ old('currency', $vacancy->currency ?? '') == 'AED' ? 'selected' :
                                    '' }}>AED - UAE Dirham</option>
                                <option value="SAR" {{ old('currency', $vacancy->currency ?? '') == 'SAR' ? 'selected' :
                                    '' }}>SAR - Saudi Riyal</option>
                                <option value="QAR" {{ old('currency', $vacancy->currency ?? '') == 'QAR' ? 'selected' :
                                    '' }}>QAR - Qatari Riyal</option>
                                <option value="KWD" {{ old('currency', $vacancy->currency ?? '') == 'KWD' ? 'selected' :
                                    '' }}>KWD - Kuwaiti Dinar</option>
                                <option value="BHD" {{ old('currency', $vacancy->currency ?? '') == 'BHD' ? 'selected' :
                                    '' }}>BHD - Bahraini Dinar</option>
                                <option value="OMR" {{ old('currency', $vacancy->currency ?? '') == 'OMR' ? 'selected' :
                                    '' }}>OMR - Omani Rial</option>

                            </select>
                        </div>


                        <div class="mb-3">
                            <label class="form-label">Interview Date</label>
                            <input type="date" name="interview_date" class="form-control"
                                value="{{ old('interview_date', $vacancy->interview_date ?? '') }}">
                        </div>




                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="active" {{ old('status', $vacancy->status ?? '') == 'active' ? 'selected'
                                    : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $vacancy->status ?? '') == 'inactive' ?
                                    'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="vacancy_image" class="form-control">
                        </div>
                        @if(!empty($vacancy?->vacancy_image))
                        <div class="mb-3 " style="width: 200px;">
                            <img src="{{ asset('uploads/' . $vacancy->vacancy_image) }}" class="img-fluid rounded">
                        </div>
                        @endif

                        <div class="d-grid gap-2">
                            <button class="btn btn-success">
                                {{ $vacancy ? 'Update' : 'Save' }}
                            </button>

                            <a href="{{ route('admin.vacancies.index') }}" class="btn btn-light">
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tom-select@2.3.1/dist/js/tom-select.complete.min.js"></script>
<script>
    $(document).ready(function () {

        $('#general_requirements').summernote({
            height: 150,
            placeholder: 'Write general requirements...'
        });

        $('#description').summernote({
            height: 250,
            placeholder: 'Write full vacancy description...'
        });

        // 🔥 IMPORTANT FIX
        $('form').on('submit', function () {
            let general = $('#general_requirements').summernote('code');
            let desc = $('#description').summernote('code');

            $('#general_requirements').val(general);
            $('#description').val(desc);

            // convert empty editor weird HTML to empty string
            if (general === '<p><br></p>') $('#general_requirements').val('');
            if (desc === '<p><br></p>') $('#description').val('');
        });

    });



    new TomSelect("#categories", {
        plugins: ['remove_button'],
        persist: false,
        create: false,
        placeholder: "Choose categories...",
        maxItems: null,
    });
</script>
@endpush