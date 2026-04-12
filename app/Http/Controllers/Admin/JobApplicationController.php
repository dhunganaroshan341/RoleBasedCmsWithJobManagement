<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    public function index(Job $job, Request $request)
    {
        if ($request->ajax()) {
            $search = $request->input('search.value');
            $columns = $request->input('columns');
            $order = $request->input('order')[0];
            $orderColumnIndex = $order['column'];
            $orderBy = $order['dir'];

            // ✅ Scoped to job
            $applicationsQuery = $job->applications()->with(['jobSeeker']);

            // Filtering
            if ($search) {
                $applicationsQuery->where(function ($query) use ($search) {
                    $query->whereHas('jobSeeker', fn($q) => $q->where('name', 'LIKE', "%$search%"))
                        ->orWhere('cover_letter', 'LIKE', "%$search%")
                        ->orWhere('status', 'LIKE', "%$search%");
                });
            }

            $orderColumnName = $columns[$orderColumnIndex]['data'] ?? 'created_at';
            $applicationsQuery->orderBy($orderColumnName, $orderBy);

            return DataTables::eloquent($applicationsQuery)
                ->addIndexColumn()
                ->addColumn('job_title', fn() => $job->title ?? '-')
                ->addColumn('job_seeker', fn($item) => optional($item->jobSeeker)->name ?? '-')
                ->addColumn('status', function ($item) {
                    return '<select class="form-select application-status" data-id="' . $item->id . '">
                                <option value="applied" ' . ($item->status == 'applied' ? 'selected' : '') . '>Applied</option>
                                <option value="shortlisted" ' . ($item->status == 'shortlisted' ? 'selected' : '') . '>Shortlisted</option>
                                <option value="rejected" ' . ($item->status == 'rejected' ? 'selected' : '') . '>Rejected</option>
                            </select>';
                })
                ->addColumn('action', fn($data) => view('Admin.Button.button', compact('data')))
                ->rawColumns(['status', 'action'])
                ->make(true);
        }

        return view('Admin.pages.application.index', compact('job'));
    }

    public function store(Job $job, JobApplicationRequest $request)
    {
        $application = $job->applications()->create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!',
            'data' => $application
        ]);
    }

    public function update(Job $job, JobApplicationRequest $request, $id)
    {
        $application = $job->applications()->findOrFail($id);

        $application->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully!',
            'data' => $application
        ]);
    }

    public function destroy(Job $job, $id)
    {
        $application = $job->applications()->findOrFail($id);
        $application->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully!'
        ]);
    }

    public function manageStatus(Job $job, $id, Request $request)
    {
        $request->validate([
            'status' => 'required|in:applied,shortlisted,rejected'
        ]);

        $application = $job->applications()->findOrFail($id);
        $application->update(['status' => $request->status]);

        return response()->json([
            'success' => true,
            'message' => 'Status updated successfully!',
            'data' => $application
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | SMART APPLY (AUTH USER)
    |--------------------------------------------------------------------------
    */
    public function smartApply(Job $job)
    {
        $user = auth()->user();

        $profile = $user->jobSeekerProfile;
        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Please complete your job seeker profile before applying.'
            ], 422);
        }

        $alreadyApplied = $job->applications()
            ->where('job_seeker_profile_id', $profile->id)
            ->exists();

        if ($alreadyApplied) {
            return response()->json([
                'success' => false,
                'message' => 'You have already applied for this job.'
            ], 409);
        }

        $application = $job->applications()->create([
            'job_seeker_profile_id' => $profile->id,
            'status' => 'applied',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your application has been submitted successfully!',
            'data' => $application,
        ], 201);
    }

    /*
    |--------------------------------------------------------------------------
    | MANUAL APPLY (GUEST)
    |--------------------------------------------------------------------------
    */
    public function manualApply(Request $request, Job $job)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'desired_role' => 'required|string|max:255',
            'resume_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
            'bio' => 'nullable|string',
        ]);

        $resumePath = $request->file('resume_file')->store('uploads/resumes', 'public');

        $application = $job->applications()->create([
            'job_seeker_profile_id' => null,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'desired_role' => $request->desired_role,
            'bio' => $request->bio,
            'resume_file' => $resumePath,
            'status' => 'applied',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your application has been submitted successfully!',
            'data' => $application
        ]);
    }
}
