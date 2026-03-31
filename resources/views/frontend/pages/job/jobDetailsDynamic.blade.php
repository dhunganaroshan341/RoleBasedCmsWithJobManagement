@extends('frontend.layouts.layout')

@php
$title = 'Vacancy Details';
$subTitle = 'Vacancy Details';
$css =
'
<link href="' .
        asset('assets/css/module-css/header.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/page-title.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/job-details.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/subscribe.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/footer.css') .
        '" rel="stylesheet">
';
@endphp

@section('content')
@include('frontend.pages.job.jobApplyModal')

<section class="job-details pt_110 pb_120">
    <div class="auto-container">
        <div class="row clearfix">

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side">
                <div class="job-sidebar mr_40">
                    <div class="info-widget sidebar-widget mb_30">
                        <h3 class="mb_20">Vacancy Info</h3>
                        <ul class="clearfix">
                            <li>
                                <h5>Job</h5>
                                <p>{{ $job->title ?? 'N/A' }}</p>
                            </li>
                            <li>
                                <h5>Company</h5>
                                <p>{{ $job->vacancy->custom_company_name ?? 'N/A' }} -
                                <p>{{ $job->vacancy->custom_company_country ?? 'N/A' }}</p>
                                </p>
                            </li>
                            <li>
                                <h5>Salary</h5>
                                <p>{{ $job->salary ?? 'N/A' }}</p>
                            </li>
                            <li>
                                <h5>Total Positions</h5>
                                <p>
                                    @if(!is_null($job->male_openings) || !is_null($job->female_openings))
                                    {{ $job->male_openings ?? 0 }} male,
                                    {{ $job->female_openings ?? 0 }} female
                                    @else
                                    {{ $job->total_openings ?? 'N/A' }}
                                    @endif
                                </p>
                            </li>
                            <li>
                                <h5>Category</h5>
                                <p>
                                    @foreach ($job->vacancy->categories as $category)
                                    {{ $category->name }}@if (!$loop->last)
                                    ,
                                    @endif
                                    @endforeach
                                </p>
                            </li>
                            <li>
                                <h5>Interview Date</h5>
                                <p>{{ \Carbon\Carbon::parse($job->vacancy->interview_date)->format('d M, Y') ?? 'N/A' }}
                                </p>
                            </li>
                            <li>
                                <h5>Vacancy Code</h5>
                                <p>{{ $job->vacancy->vacancy_code ?? 'N/A' }}</p>
                            </li>
                        </ul>
                    </div>

                    <div class="requirements-widget sidebar-widget">
                        <h3>General Requirements</h3>
                        <div class="requirements-content">
                            {!! $job->vacancy->general_requirements ?? '<p>No requirements specified.</p>' !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Side -->
            <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                <div class="job-details-content">

                    <!-- Toggle Buttons -->
                    <div class="mb-4 d-flex gap-3 align-items-start">


                        <div class="mb-4 d-flex gap-3 align-items-start">

                            <button class="theme-btn toggle-btn" id="descriptionViewBtn"> Detail</button>
                            <button class="theme-btn toggle-btn active" id="imageViewBtn">Newspaper
                                Ad</button>

                            <div>
                                @auth
                                {{-- If user is logged in --}}
                                <button type="button" class="btn theme-btn toggle-btn smartApplyBtn"
                                    data-job-id="{{ $job->id }}">
                                    <i class="fa fa-paper-plane"></i> Smart Apply
                                </button>
                                @else
                                {{-- If user is not logged in --}}
                                <button type="button" class="btn theme-btn toggle-btn" data-bs-toggle="modal"
                                    data-bs-target="#applyJobModal">
                                    <i class="fas fa-file-alt"></i> Apply
                                </button>

                                <a href="{{ route('jobseeker.create') }}" class="btn theme-btn toggle-btn">
                                    <i class="fa fa-paper-plane" aria-hidden="true"></i> Login & Auto Apply
                                </a>
                                @endauth
                            </div>
                        </div>

                    </div>


                    <!-- Image View -->
                    <div id="imageView">
                        @if ($job->vacancy->vacancy_image)
                        <div class="text-box mb_60">

                            <img src="{{ asset($job->vacancy->vacancy_image) }}">
                            <p class="mt_20 text-muted">Scan of the original job posting.</p>
                        </div>
                        @else
                        <p class="text-muted">No advertisement image available.</p>
                        @endif
                    </div>

                    <!-- Description View -->
                    <div id="descriptionView" class="d-none">
                        <div class="text-box mb_60">
                            <h3>{{ $job->title }}</h3>
                            <p>{!! $job->vacancy->description ?? 'No description available.' !!}</p>
                        </div>

                        @if ($job->responsibilities)
                        <div class="text-box mb_60">
                            <h3>Responsibilities</h3>
                            {!! $job->responsibilities !!}
                        </div>
                        @endif
                    </div>

                </div>
            </div>

        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
    .toggle-btn {
        padding: 8px 16px;
        border: none;
        cursor: pointer;
    }

    .toggle-btn.active {
        background: var(--theme-color, #ff6600);
        color: #fff;
    }

    .newspaper-image img {
        border: 1px solid #ddd;
        max-width: 100%;
        height: auto;
        object-fit: contain;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
    }

    .requirements-content ul {
        padding-left: 20px;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageBtn = document.getElementById('imageViewBtn');
        const descBtn = document.getElementById('descriptionViewBtn');
        const imageView = document.getElementById('imageView');
        const descriptionView = document.getElementById('descriptionView');

        imageBtn.addEventListener('click', () => {
            imageView.classList.remove('d-none');
            descriptionView.classList.add('d-none');
            imageBtn.classList.add('active');
            descBtn.classList.remove('active');
        });

        descBtn.addEventListener('click', () => {
            descriptionView.classList.remove('d-none');
            imageView.classList.add('d-none');
            descBtn.classList.add('active');
            imageBtn.classList.remove('active');
        });

        $('.smartApplyBtn').on('click', function () {
            let jobId = $(this).data('job-id');
            let btn = $(this);

            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to smart apply for this job?",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, apply!',
                cancelButtonText: 'Cancel',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('jobseeker.smartApply', ':id') }}".replace(':id',
                            jobId),
                        type: "POST",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function (response) {
                            Swal.fire('Success', response.message, 'success');
                            btn.html('<i class="fa-solid fa-check"></i> Applied')
                                .prop('disabled', true)
                                .removeClass('theme-btn')
                                .addClass('btn-success');
                        },
                        error: function (xhr) {
                            let msg = 'Something went wrong, please try again.';
                            if (xhr.responseJSON && xhr.responseJSON.message) {
                                msg = xhr.responseJSON.message;
                            }
                            Swal.fire('Error', msg, 'error');
                        }
                    });
                }
            });
        });

    });
</script>
@endpush