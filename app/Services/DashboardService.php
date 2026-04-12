<?php

namespace App\Services;

use App\Models\User;
use App\Models\Post;
use App\Models\TourPackage;
use App\Models\JobCategory;
use App\Models\Vacancy;
use App\Models\Job;
use App\Models\JobApplication;

class DashboardService
{
    public function getStats()
    {
        return [
            // USERS
            'admin' => User::where('role', 'Admin')->count(),
            'user' => User::where('role', 'User')->count(),
            'totaluser' => User::count(),

            // POSTS & PACKAGES
            'today_post' => Post::whereDate('created_at', today())->count(),
            'totalpost' => Post::count(),
            'totalPackages' => TourPackage::count(),

            // 🔥 JOB SYSTEM (HIERARCHY)
            'total_job_categories' => JobCategory::count(),
            'total_vacancies' => Vacancy::count(),
            'total_jobs' => Job::count(),
            'total_applications' => JobApplication::count(),

            // OPTIONAL: Today activity
            'today_applications' => JobApplication::whereDate('created_at', today())->count(),
        ];
    }

    public function getHierarchyStats()
    {
        return [
            'job_categories_with_vacancies' => JobCategory::withCount('vacancies')->get(),

            'vacancies_with_jobs' => Vacancy::withCount('jobs')->get(),

            'jobs_with_applications' => Job::withCount('applications')->get(),
        ];
    }

    public function getAssets()
    {
        return [
            'extraJs' => config('js-map.admin.chartjs')
        ];
    }
}
