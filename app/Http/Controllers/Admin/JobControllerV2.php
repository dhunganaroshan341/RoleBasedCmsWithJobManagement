<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JobControllerV2 extends Controller
{
    /**
     * Display a listing of jobs under a specific vacancy.
     */
    public function index(Request $request)
    {
        $vacancies = \App\Models\Vacancy::latest()->pluck('title', 'id');

        $jobs = \App\Models\Job::with([
            'vacancy.company',
            'vacancy.categories' // 🔥 FIXED (many-to-many)
        ])
            ->when($request->vacancy_id, function ($query) use ($request) {
                $query->where('vacancy_id', $request->vacancy_id);
            })
            ->latest()
            ->paginate(10);
        dd($jobs->toArray());

        return view('Admin.pages.Job.jobIndex', compact('jobs', 'vacancies'));
    }


    /**
     * Store a newly created job under a specific vacancy.
     */
    // Store a newly created job
    public function store(JobRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            // openings logic
            if ($request->input('openings_mode') === 'male-female') {
                $data['male_opening'] = (int) $request->input('male_opening', 0);
                $data['female_opening'] = (int) $request->input('female_opening', 0);
                $data['total_openings'] = $data['male_opening'] + $data['female_opening'];
            } else {
                $data['total_openings'] = (int) $request->input('total_openings', 0);
                $data['male_opening'] = 0;
                $data['female_opening'] = 0;
            }

            // image upload
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/jobs'), $filename);
                $data['image'] = 'uploads/jobs/' . $filename;
            }

            $job = Job::create($data);

            $job->categories()->sync($request->input('category_ids', []));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job created successfully',
                'data' => $job
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    // Show a specific job
    public function show(Job $job)
    {
        $job->load(['categories', 'ourCountry', 'employer']);

        return response()->json([
            'success' => true,
            'data' => $job,
        ]);
    }
    // Update a specific job
    public function update(JobRequest $request, Job $job)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();

            // openings logic
            if ($request->input('openings_mode') === 'male-female') {
                $data['male_opening'] = (int) $request->input('male_opening', 0);
                $data['female_opening'] = (int) $request->input('female_opening', 0);
                $data['total_openings'] = $data['male_opening'] + $data['female_opening'];
            } else {
                $data['total_openings'] = (int) $request->input('total_openings', 0);
                $data['male_opening'] = 0;
                $data['female_opening'] = 0;
            }

            // image update
            if ($request->hasFile('image')) {
                if ($job->image && file_exists(public_path($job->image))) {
                    unlink(public_path($job->image));
                }

                $file = $request->file('image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('uploads/jobs'), $filename);
                $data['image'] = 'uploads/jobs/' . $filename;
            }

            $job->update($data);

            $job->categories()->sync($request->input('category_ids', []));

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Job updated successfully',
                'data' => $job
            ]);
        } catch (\Exception $e) {
            DB::rollBack();

            \Log::error($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    public function destroy(Job $job)
    {
        try {
            if ($job->image && file_exists(public_path($job->image))) {
                unlink(public_path($job->image));
            }

            $job->delete();

            return response()->json([
                'success' => true,
                'message' => 'Job deleted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Toggle job active/inactive status.
     */
    public function toggleStatus(Vacancy $vacancy, Job $job)
    {
        abort_if($job->vacancy_id !== $vacancy->id, 404);

        $job->status = $job->status === 'Active' ? 'Inactive' : 'Active';
        $job->save();

        return response()->json([
            'success' => true,
            'message' => 'Job status updated.',
        ]);
    }

    /**
     * Handle single image upload.
     */
    private function uploadSingleImage($request, $field, $path, $existing = null)
    {
        if ($request->hasFile($field)) {
            // Delete old image if exists
            if ($existing && $existing->image && file_exists(public_path($existing->image))) {
                @unlink(public_path($existing->image));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path($path), $filename);

            return $path . '/' . $filename;
        }

        return $existing->image ?? null;
    }
    public  function searchJobs(Request $request)
    {
        $query = Job::query();

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->input('location') . '%');
        }

        if ($request->filled('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('id', $request->input('category_id'));
            });
        }

        if ($request->filled('country_id')) {
            $query->where('our_country_id', $request->input('country_id'));
        }

        $jobs = $query->with(['employer', 'categories', 'ourCountry'])->paginate(10);

        return response()->json([
            'success' => true,
            'data' => $jobs,
        ]);
    }
}
