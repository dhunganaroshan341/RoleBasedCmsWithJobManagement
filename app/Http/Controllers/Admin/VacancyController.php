<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobCategory;
use App\Models\Vacancy;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class VacancyController extends Controller
{

    public function index(Request $request)
    {
        $query = Vacancy::with('company')->withCount('jobs');

        if ($request->search) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        $vacancies = $query->latest()->get();
        // $vacancies = Vacancy::with('company')->withCount('jobs')->latest()->get();
        return view('Admin.pages.Vacancy.index', compact('vacancies'));
    }
    public function create()
    {
        $categorys = JobCategory::all();
        return view('Admin.pages.Vacancy.form', [
            'vacancy' => null,
            'categorys' => $categorys
        ]);
    }

    public function edit(Vacancy $vacancy)
    {
        $categorys = JobCategory::all();
        return view('Admin.pages.Vacancy.form', compact('vacancy', 'categorys'));
    }

    public function show(Vacancy $vacancy)
    {
        // Load related company + jobs under this vacancy
        $vacancy->load([
            'company',
            'jobs.categories',
            'jobs.ourCountry',
            'jobs.employer'
        ]);

        return response()->json([
            'success' => true,
            'data' => $vacancy,
        ]);
    }
    /**
     * Store a new vacancy along with multiple jobs.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'nullable|exists:clients,id',
            'custom_company_name' => 'nullable|string|max:255',
            'custom_company_country' => 'nullable|string|max:255',

            'title' => 'required|string|max:255',
            'currency' => 'nullable|string|max:10',
            'interview_date' => 'nullable|date',
            'general_requirements' => 'nullable|string',
            'description' => 'nullable|string',

            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:job_categories,id',

            'status' => 'required|in:active,inactive',
            'vacancy_image' => 'nullable|image|max:2048',
        ]);

        // IMAGE
        if ($request->hasFile('vacancy_image')) {
            $validated['vacancy_image'] =
                $request->file('vacancy_image')->store('vacancies', 'public');
        }

        // ✅ CREATE FIRST
        $vacancy = Vacancy::create($validated);

        // ✅ THEN SYNC CATEGORIES
        $vacancy->categories()->sync($request->category_ids ?? []);

        return redirect()
            ->back()
            ->with('success', 'Vacancy created successfully!');
    }
    /**
     * Update existing vacancy with jobs
     */
    public function update(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $validated = $request->validate([
            'company_id' => 'nullable|exists:clients,id',
            'custom_company_name' => 'nullable|string|max:255',
            'custom_company_country' => 'nullable|string|max:255',

            'title' => 'required|string|max:255',
            'currency' => 'nullable|string|max:10',
            'interview_date' => 'nullable|date',
            'general_requirements' => 'nullable|string',
            'description' => 'nullable|string',

            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:job_categories,id',

            'status' => 'required|in:active,inactive',
            'vacancy_image' => 'nullable|image|max:2048',
        ]);

        // IMAGE UPDATE
        if ($request->hasFile('vacancy_image')) {

            if ($vacancy->vacancy_image && \Storage::disk('public')->exists($vacancy->vacancy_image)) {
                \Storage::disk('public')->delete($vacancy->vacancy_image);
            }

            $validated['vacancy_image'] =
                $request->file('vacancy_image')->store('vacancies', 'public');
        }

        $vacancy->update($validated);

        // ✅ SYNC CATEGORIES (IMPORTANT)
        $vacancy->categories()->sync($request->category_ids ?? []);

        return redirect()
            ->route('admin.vacancies.index')
            ->with('success', 'Vacancy updated successfully!');
    }

    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        // ✅ 1. Detach categories (IMPORTANT for many-to-many safety)
        $vacancy->categories()->detach();

        // ✅ 2. Delete image if exists
        if ($vacancy->vacancy_image && \Storage::disk('public')->exists($vacancy->vacancy_image)) {
            \Storage::disk('public')->delete($vacancy->vacancy_image);
        }

        // ✅ 3. Delete vacancy
        $vacancy->delete();

        return redirect()
            ->route('admin.vacancies.index')
            ->with('success', 'Vacancy deleted successfully!');
    }
}
