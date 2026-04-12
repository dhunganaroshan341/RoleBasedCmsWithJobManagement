@extends('Admin.layout.master')

@section('content')
<div class="container-fluid py-3">
    @include('components.admin-bread-crumb-no-button')
    {{-- 🔥 KPI CARDS --}}
    <div class="row g-3 mb-4">

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-1">Users</p>
                    <h3>{{ $totaluser }}</h3>
                    <small class="text-primary">Admin: {{ $admin }} | User: {{ $user }}</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-1">Posts</p>
                    <h3>{{ $totalpost }}</h3>
                    <small class="text-muted">Today: {{ $today_post }}</small>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-1">Packages</p>
                    <h3>{{ $totalPackages }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted mb-1">Applications</p>
                    <h3>{{ $total_applications }}</h3>
                    <small class="text-muted">Today: {{ $today_applications }}</small>
                </div>
            </div>
        </div>

    </div>

    {{-- 🔥 JOB SYSTEM SUMMARY --}}
    <div class="row g-3 mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted">Job Categories</p>
                    <h4>{{ $total_job_categories }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted">Vacancies</p>
                    <h4>{{ $total_vacancies }}</h4>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <p class="text-muted">Jobs</p>
                    <h4>{{ $total_jobs }}</h4>
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