@extends('frontend.layouts.layout')

@php
$title = 'Job Openings';
$subTitle = 'Job Openings';
$css =
'
<link href="' .
        asset('assets/css/module-css/header.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/page-title.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/job.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/welcome.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/subscribe.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/footer.css') .
        '" rel="stylesheet">';
@endphp

@push('styles')
<style>
    .form-select {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-image: none !important;
        padding-right: 2rem;
    }
</style>
@endpush

@section('content')
<section class="job-section pt_110 pb_90">
    <div class="auto-container">
        <div class="sec-title centred pb_30 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">Posted Jobs</span>
            <h2 class="title-animation">Find Your Job</h2>
        </div>

        <!-- Search Field + Reset Button -->
        <!-- Job Search Form -->
        <!-- Job Search Form: Minimalist -->
        <div class="text-center mb-4 d-flex justify-content-center gap-2 flex-wrap">
            <form action="{{ route('jobs') }}" method="GET">
                <input type="text" name="search" placeholder="Search job, e.g., Electrician" />

                <!-- Submit Button: Magnifying Glass, No Background -->
                <button type="submit" class="btn btn-link p-2 text-dark" style="text-decoration: none;">
                    <i class="fas fa-search fa-lg"></i>
                </button>

                <!-- Reset Button: Minimal, X icon -->
                <a href="{{ route('jobs') }}" class="btn btn-link p-2 text-dark" style="text-decoration: none;">
                    <i class="fas fa-times fa-lg"></i>
                </a>
            </form>
        </div>



        <!-- Job Filters -->
        <div class="text-center mb-4 d-flex justify-content-center gap-3 flex-wrap align-items-center">

            <!-- Toggle Buttons -->
            <div class="d-flex gap-2 flex-wrap">
                <button type="button" class="theme-btn toggle-btn active" id="latestJobsBtn">
                    <i class="fas fa-th"></i> Latest Jobs
                </button>
                <button type="button" class="theme-btn toggle-btn" id="topCategoriesBtn">
                    <i class="fas fa-list"></i> Top Categories
                </button>
                <button type="button" class="theme-btn toggle-btn" id="allJobsBtn">
                    <i class="fas fa-table"></i> All Jobs
                </button>
            </div>





        </div>


        <!-- Minimal CSS (optional for extra "sexy" look) -->





        <!-- Latest Jobs Grid -->
        <div id="latestJobsView" class="inner-container">
            <div class="d-flex justify-content-center align-items-center gap-3 mb-4 flex-wrap">

                <!-- Category -->
                <form action="{{ route('jobs') }}" method="GET">
                    <select name="category" class="form-select form-select-sm border rounded shadow-sm"
                        style="min-width: 200px; cursor: pointer;">

                        <option value="">Select Category</option>

                        @foreach ($jobCategories as $category)
                        <option value="{{ $category->slug }}">
                            {{ $category->name }}
                        </option>
                        @endforeach

                    </select>
                </form>

                <!-- Vacancy -->
                <form action="{{ route('jobs') }}" method="GET">
                    <select name="vacancy" class="form-select form-select-sm border rounded shadow-sm"
                        style="min-width: 200px; cursor: pointer;" onchange="this.form.submit()">

                        <option value="">Select Vacancy</option>

                        @foreach ($vacancies as $vacancy)
                        <option value="{{ $vacancy->id }}">
                            {{ $vacancy->title }}
                        </option>
                        @endforeach

                    </select>
                </form>

            </div>
            <div class="row">
                @foreach ($latestJobs as $job)
                <div class="col-12 mb-4">
                    <div class="job-block-one h-100">
                        <div class="upper-box">
                            <ul class="job-info">
                                <li><i class="icon-43"></i>Posted <span>{{ $job->created_at->diffInDays(now()) }}
                                        days ago</span></li>
                                <li>Vacancy Code: <span>{{ $job->job_code ?? 'VC' . $job->id }}</span></li>
                            </ul>
                        </div>
                        <div class="inner-box">
                            <div class="title-box">
                                <h3 class="job-title">{{ $job->title }}</h3>
                                <span class="job-subheading">
                                    {{ $job->custom_company_name ?? ($job->custom_company_name ?? 'N/A') }}
                                </span>
                            </div>
                            <div class="jobs-list-box">
                                <ul>
                                    <li><strong>Openings:</strong>
                                        {{ $job->total_openings ?? ($job->male_opening + $job->female_opening ?? 'N/A')
                                        }}
                                    </li>
                                    @if ($job->categories)
                                    <li><strong>Category:</strong>
                                        {{ implode(', ', $job->categories->pluck('name')->toArray()) }}</li>
                                    @endif
                                    @if ($job->location)
                                    <li><strong>Location:</strong> {{ $job->location }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="btn-box mt-3">
                                <a href="{{ route('jobById', $job->id) }}" class="theme-btn btn-one">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Top Categories View -->
        <div id="topCategoriesView" class="inner-container d-none">
            @foreach ($categoryJobs as $cat)
            <h4 class="mb-3 mt-4">{{ $cat['category_name'] }} ({{ count($cat['jobs']) }} jobs)</h4>
            <div class="row mb-4">
                @foreach ($cat['jobs'] as $job)
                <div class="col-12 mb-3">
                    <div class="job-block-one h-100">
                        <div class="upper-box">
                            <ul class="job-info">
                                <li><i class="icon-43"></i>Posted
                                    <span>{{ $job->created_at->diffInDays(now()) }} days ago</span>
                                </li>
                                <li>Vacancy Code: <span>{{ $job->job_code ?? 'VC' . $job->id }}</span></li>
                            </ul>
                        </div>
                        <div class="inner-box">
                            <div class="title-box">
                                <h3 class="job-title">{{ $job->title }}</h3>
                                <span class="job-subheading">
                                    {{ $job->vacancy?->custom_company_name ?? ($job->vacancy?->company->name ?? 'N/A')
                                    }}
                                </span>
                            </div>
                            <div class="jobs-list-box">
                                <ul>
                                    <li><strong>Openings:</strong>
                                        {{ $job->total_openings ?? ($job->male_opening + $job->female_opening ?? 'N/A')
                                        }}
                                    </li>
                                    @if ($job->location)
                                    <li><strong>Location:</strong> {{ $job->location }}</li>
                                    @endif
                                </ul>
                            </div>
                            <div class="btn-box mt-3">
                                <a href="{{ route('jobById', $job->id) }}" class="theme-btn btn-one">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach
        </div>

        <!-- All Jobs Table -->
        <div id="allJobsView" class="inner-container d-none">
            @include('frontend.pages.job.vacancyDatatable')
        </div>
    </div>
</section>
@endsection

@push('styles')
<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
    .toggle-btn {
        border: none;
        padding: 8px 16px;
        font-size: 14px;
        cursor: pointer;
        transition: 0.3s;
    }

    .toggle-btn.active {
        background: var(--theme-color, #ff6600);
        color: #fff;
    }

    .job-title {
        font-size: 16px;
        font-weight: 600;
    }

    #jobsTable th {
        font-size: 14px;
    }

    #jobsTable td {
        font-size: 13px;
    }

    #jobsTable thead {
        background: var(--secondary-color);
        color: #fff;
        font-weight: bold;
    }

    #jobsTable tbody tr:hover {
        background: rgba(0, 128, 0, 0.05);
        transition: 0.3s;
    }

    /* DataTable Search box */
    .dataTables_filter input {
        border: 2px solid var(--secondary-color);
        border-radius: 8px;
        padding: 6px 12px;
        outline: none;
        transition: 0.3s;
    }

    .dataTables_filter input:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 8px rgba(0, 128, 0, 0.3);
    }

    .dataTables_length select {
        border: 2px solid var(--secondary-color);
        border-radius: 6px;
        padding: 4px 8px;
        background: #fff;
        transition: 0.3s;
    }

    .dataTables_length select:focus {
        border-color: var(--primary-color);
        box-shadow: 0 0 6px rgba(0, 128, 0, 0.25);
    }

    .dataTables_paginate .paginate_button {
        background: #fff;
        border: 2px solid var(--secondary-color);
        color: var(--secondary-color) !important;
        border-radius: 50%;
        width: 36px;
        height: 36px;
        line-height: 32px;
        margin: 0 4px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
    }

    .dataTables_paginate .paginate_button:hover {
        background: var(--secondary-color);
        color: #fff !important;
    }

    .dataTables_paginate .paginate_button.current {
        background: var(--secondary-color) !important;
        color: #fff !important;
        border-color: var(--secondary-color);
        font-weight: bold;
        box-shadow: 0 0 6px rgba(0, 128, 0, 0.4);
    }
</style>
@endpush
@push('scripts')
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        // Toggle buttons
        const latestBtn = $('#latestJobsBtn');
        const topBtn = $('#topCategoriesBtn');
        const allBtn = $('#allJobsBtn');

        const latestView = $('#latestJobsView');
        const topView = $('#topCategoriesView');
        const allView = $('#allJobsView');

        function setActive(button) {
            $('.toggle-btn').removeClass('active');
            button.addClass('active');
        }

        latestBtn.click(function () {
            latestView.removeClass('d-none');
            topView.addClass('d-none');
            allView.addClass('d-none');
            setActive(latestBtn);
        });

        topBtn.click(function () {
            latestView.addClass('d-none');
            topView.removeClass('d-none');
            allView.addClass('d-none');
            setActive(topBtn);
        });

        allBtn.click(function () {
            latestView.addClass('d-none');
            topView.addClass('d-none');
            allView.removeClass('d-none');
            setActive(allBtn);
        });

        // DataTable
        $('#jobsTable').DataTable({
            language: {
                paginate: {
                    previous: '<i class="fa fa-chevron-left"></i>',
                    next: '<i class="fa fa-chevron-right"></i>'
                }
            },
            pageLength: 5,
            lengthMenu: [5, 10, 25, 50],
            ordering: true,
            searching: true
        });

        // Auto-submit category select (theme buttons untouched)
        $('#categorySelect').on('change', function () {
            $(this).closest('form').submit();
        });
    });
</script>
@endpush