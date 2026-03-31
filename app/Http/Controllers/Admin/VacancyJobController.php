<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use App\Models\Job;
use Illuminate\Http\Request;

class VacancyJobController extends Controller
{
    /**
     * List jobs under a vacancy
     */
    public function index(Vacancy $vacancy)
    {
        $jobs = $vacancy->jobs()->latest()->get();

        return view('Admin.pages.VacancyJob.index', compact('vacancy', 'jobs'));
    }

    /**
     * Show create form
     */
    public function create(Vacancy $vacancy)
    {
        return view('Admin.pages.VacancyJob.form', [
            'vacancy' => $vacancy,
            'job' => null
        ]);
    }

    /**
     * Store job under vacancy
     */
    public function store(Request $request, Vacancy $vacancy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'total_openings' => 'nullable|integer|min:1',
            'male_opening' => 'nullable|integer|min:0',
            'female_opening' => 'nullable|integer|min:0',
        ]);

        // ✅ FORCE DEFAULTS (CRITICAL FIX)
        $validated['male_opening'] = $request->male_opening ?? 0;
        $validated['female_opening'] = $request->female_opening ?? 0;

        // ✅ AUTO CALCULATE TOTAL
        $validated['total_openings'] = $request->total_openings
            ?? ($validated['male_opening'] + $validated['female_opening']);

        // ✅ SAFETY CHECK
        if (
            $validated['male_opening'] + $validated['female_opening']
            > $validated['total_openings']
        ) {
            return back()->withErrors([
                'total_openings' => 'Male + Female cannot exceed total openings'
            ])->withInput();
        }

        $vacancy->jobs()->create($validated);

        return redirect()
            ->back()
            ->with('success', 'Job created successfully!');
    }

    /**
     * Edit form
     */
    public function edit(Vacancy $vacancy, Job $job)
    {
        // ✅ EXTRA SAFETY (important)
        if ($job->vacancy_id !== $vacancy->id) {
            abort(404);
        }

        return view('Admin.pages.VacancyJob.form', compact('vacancy', 'job'));
    }

    /**
     * Update job
     */
    public function update(Request $request, Vacancy $vacancy, Job $job)
    {
        // ✅ EXTRA SAFETY
        if ($job->vacancy_id !== $vacancy->id) {
            abort(404);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'salary' => 'nullable|numeric|min:0',
            'total_openings' => 'nullable|integer|min:1',
            'male_opening' => 'nullable|integer|min:0',
            'female_opening' => 'nullable|integer|min:0',
        ]);

        // ✅ FORCE DEFAULTS (CRITICAL FIX)
        $validated['male_opening'] = $request->male_opening ?? 0;
        $validated['female_opening'] = $request->female_opening ?? 0;

        // ✅ AUTO CALCULATE TOTAL
        $validated['total_openings'] = $request->total_openings
            ?? ($validated['male_opening'] + $validated['female_opening']);

        // ✅ SAFETY CHECK
        if (
            $validated['male_opening'] + $validated['female_opening']
            > $validated['total_openings']
        ) {
            return back()->withErrors([
                'total_openings' => 'Male + Female cannot exceed total openings'
            ])->withInput();
        }

        $job->update($validated);

        return redirect()
            ->route('admin.vacancies.jobs.index', $vacancy->id)
            ->with('success', 'Job updated successfully!');
    }

    /**
     * Delete job
     */
    public function destroy(Vacancy $vacancy, Job $job)
    {
        // ✅ EXTRA SAFETY
        if ($job->vacancy_id !== $vacancy->id) {
            abort(404);
        }

        $job->delete();

        return redirect()
            ->route('admin.vacancies.jobs.index', $vacancy->id)
            ->with('success', 'Job deleted successfully!');
    }
}
