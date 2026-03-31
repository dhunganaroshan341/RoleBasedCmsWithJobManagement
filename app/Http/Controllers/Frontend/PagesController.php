<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobCategory;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('home/about');
    }
    public function categories()
    {
        $categories = JobCategory::all(); // or paginate if needed
        return view('frontend.pages.categories', compact('categories'));
    }
    public function job()
    {
        return view('frontend.pages/job/hire');
    }
    public function job2()
    {
        return view('frontend.pages/job/job2');
    }


    public function job3(Request $request)
    {
        // Get search parameter from query string
        $searchTitle = $request->query('search');
        $vacancyId   = $request->query('vacancy'); // ✅ ADD THIS ONLY

        // Base query for jobs
        $jobsQuery = Job::with(['ourCountry', 'categories', 'vacancy']);

        // Apply search if provided
        if ($searchTitle) {
            $jobsQuery->where('title', 'like', '%' . $searchTitle . '%');
        }

        // ✅ APPLY VACANCY FILTER (ONLY ADDITION)
        if ($vacancyId) {
            $jobsQuery->where('vacancy_id', $vacancyId);
        }

        // Get filtered jobs
        $jobs = $jobsQuery->orderBy('created_at', 'desc')->get();

        // Latest jobs
        $latestJobs = Job::with(['vacancy', 'categories'])
            ->orderBy('created_at', 'desc')
            ->get();

        // Top 3 categories with most jobs
        $topCategories = JobCategory::withCount('jobs')
            ->orderBy('jobs_count', 'desc')
            ->take(3)
            ->get();

        // Category-wise jobs
        $categoryJobs = [];
        foreach ($topCategories as $category) {
            $categoryJobs[] = [
                'category_name' => $category->name,
                'jobs' => $category->jobs()->with('vacancy')->get()
            ];
        }

        $jobCategories = JobCategory::all();

        // Vacancies
        $vacancies = \App\Models\Vacancy::all();

        return view('frontend.pages.job.job3', compact(
            'latestJobs',
            'categoryJobs',
            'jobs',
            'topCategories',
            'jobCategories',
            'vacancies'
        ));
    }



    public function job4()
    {
        return view('frontend.pages/job/job4');
    }
    public function jobDetails()
    {
        return view('frontend.pages/job/jobDetails');
    }
    public function jobDetailsById($id)
    {
        // Fetch the job by ID with country and categories
        $job = Job::with(['ourCountry', 'categories', 'vacancy'])->findOrFail($id);
        // Return the job details view
        return view('frontend.pages.job.jobDetailsDynamic', compact('job'));
    }
    public function portfolio()
    {
        return view('frontend.pages/portfoliyo/portfolio');
    }
    public function portfolio2()
    {
        return view('frontend.pages/portfoliyo/portfolio2');
    }
    public function portfolio3()
    {
        return view('frontend.pages/portfoliyo/portfolio3');
    }
    public function pageError()
    {
        return view('frontend.pages/pageError');
    }
    public function faq()
    {
        return view('frontend.pages/faq');
    }
    public function login()
    {
        return view('frontend.pages/login');
    }
    public function signup()
    {
        return view('frontend.pages/signup');
    }
    public function team()
    {
        return view('frontend.pages/team');
    }
    public function testimonial()
    {
        return view('frontend.pages/testimonial');
    }
}
