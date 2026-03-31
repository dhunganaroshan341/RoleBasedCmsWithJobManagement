<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class JobController extends Controller
{
    /**
     * Display a listing of jobs under a specific vacancy.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $jobs = Job::with([
                'employer:id,name',
                'ourCountry:id,name',
                'vacancy:id,title,custom_company_name,custom_company_country',
                'vacancy.categories:id,name'
            ])->latest();

            return datatables()->eloquent($jobs)
                ->addIndexColumn()

                // ACTION BUTTONS
                ->addColumn('action', function ($job) {
                    return view('Admin.Button.button', ['data' => $job])->render();
                })

                // IMAGE
                ->addColumn('image', function ($job) {
                    $image = $job->image_url ?? asset('uploads/' . $job->image);
                    $default = asset('user.png');

                    return '<img src="' . $image . '"
                    width="50" height="50"
                    class="rounded"
                    style="object-fit:cover"
                    onerror="this.src=\'' . $default . '\'">';
                })

                // STATUS TOGGLE
                ->addColumn('status', function ($job) {
                    return '
                    <input class="form-check-input statusIdData"
                        type="checkbox"
                        data-id="' . $job->id . '"
                        role="switch"
                        ' . (strtolower($job->status) === 'active' ? 'checked' : '') . '>
                ';
                })

                // VACANCY FIELDS
                ->addColumn('vacancy_title', function ($job) {
                    return $job->vacancy->title ?? '<em>No Vacancy</em>';
                })

                ->addColumn('vacancy_company', function ($job) {
                    return $job->vacancy->custom_company_name ?? '<em>Not Assigned</em>';
                })

                ->addColumn('vacancy_country', function ($job) {
                    return $job->vacancy->custom_company_country ?? '<em>Not Set</em>';
                })

                // EMPLOYER
                ->addColumn('employer', function ($job) {
                    return $job->employer->name ?? '<em>Not Assigned</em>';
                })

                // COUNTRY
                ->addColumn('our_country', function ($job) {
                    return $job->ourCountry->name ?? '<em>Not Set</em>';
                })

                // VACANCY CATEGORIES (OPTIMIZED)
                ->addColumn('categories', function ($job) {
                    $categories = $job->vacancy?->categories;

                    if (!$categories || $categories->isEmpty()) {
                        return '<em>No Categories</em>';
                    }

                    return $categories->map(function ($cat) {
                        return '<span class="badge bg-primary me-1">' . e($cat->name) . '</span>';
                    })->implode(' ');
                })

                // IMPORTANT: allow HTML rendering
                ->rawColumns([
                    'action',
                    'image',
                    'status',
                    'vacancy_title',
                    'vacancy_company',
                    'vacancy_country',
                    'employer',
                    'our_country',
                    'categories'
                ])

                ->make(true);
        }

        $extraJs = array_merge(
            config('js-map.admin.datatable.script'),
            config('js-map.admin.summernote.script'),
            config('js-map.admin.select2.script'),
            config('js-map.admin.buttons.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style'),
            config('js-map.admin.summernote.style'),
            config('js-map.admin.select2.style'),
            config('js-map.admin.buttons.style')
        );

        return view('Admin.pages.Job.jobIndex', [
            'extraJs' => $extraJs,
            'extraCs' => $extraCs
        ]);
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
