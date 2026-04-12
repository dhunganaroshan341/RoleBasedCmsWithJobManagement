@extends('Admin.layout.master')

@section('content')
<div class="container-fluid py-3">

    @include('components.admin-bread-crumb-no-button')

    {{-- 🔥 KPI CARDS --}}
    <div class="row g-3 mb-4">

        {{-- USERS --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Users</p>
                        <h3 class="mb-0">{{ $totaluser }}</h3>
                    </div>

                    <small class="text-primary mt-2">
                        Admin: {{ $admin }} | User: {{ $user }}
                    </small>

                </div>
            </div>
        </div>

        {{-- POSTS --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Posts</p>
                        <h3 class="mb-0">{{ $totalpost }}</h3>
                    </div>

                    <small class="text-muted mt-2">
                        Today: {{ $today_post }}
                    </small>

                </div>
            </div>
        </div>

        {{-- APPLICATIONS --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Applications</p>
                        <h3 class="mb-0">{{ $total_applications }}</h3>
                    </div>

                    <small class="text-muted mt-2">
                        Today: {{ $today_applications }}
                    </small>

                </div>
            </div>
        </div>

        {{-- JOB CATEGORIES --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Job Categories</p>
                        <h4 class="mb-0">{{ $total_job_categories }}</h4>
                    </div>

                </div>
            </div>
        </div>

        {{-- VACANCIES --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Vacancies</p>
                        <h4 class="mb-0">{{ $total_vacancies }}</h4>
                    </div>

                </div>
            </div>
        </div>

        {{-- JOBS --}}
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="card shadow-sm border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">

                    <div>
                        <p class="text-muted mb-1">Jobs</p>
                        <h4 class="mb-0">{{ $total_jobs }}</h4>
                    </div>

                </div>
            </div>
        </div>

    </div>

    {{-- 🔥 CHART --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <h5 class="mb-3 text-muted">Job System Overview</h5>

            <canvas id="dashboardChart" height="100"></canvas>

        </div>
    </div>

</div>

{{-- CHART SCRIPT --}}
<script>
    document.addEventListener("DOMContentLoaded", function () {

        const ctx = document.getElementById('dashboardChart').getContext('2d');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    'Categories',
                    'Vacancies',
                    'Jobs',
                    'Applications'
                ],
                datasets: [{
                    label: 'System Overview',
                    data: [
                        {{ $total_job_categories }},
                {{ $total_vacancies }},
                    {{ $total_jobs }},
        {{ $total_applications }}
                ],
        backgroundColor: 'rgba(54, 162, 235, 0.15)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
            }]
        },
        options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
    });

});
</script>

@endsection