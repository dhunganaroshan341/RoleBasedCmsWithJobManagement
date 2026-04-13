<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\JobApplicationRequest;
use App\Models\Job;
use App\Models\JobApplication;
use App\Services\ApplicationService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JobApplicationController extends Controller
{
    protected $applicationService;

    public function __construct(ApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function index(Request $request, Job $job = null)
    {
        $applications = $this->applicationService->getApplications($job);
        dd($applications->toArray());
        return response()->json([
            'success' => true,
            'data' => $applications
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */
    public function store(Request $request, Job $job = null)
    {
        $data = $request->validate((new JobApplicationRequest())->rules());

        if ($job) {
            $application = $job->applications()->create($data);
        } else {
            $application = JobApplication::create($data);
        }

        return response()->json([
            'success' => true,
            'message' => 'Application submitted successfully!',
            'data' => $application
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */
    public function update(Request $request, Job $job = null, $id)
    {
        $data = $request->validate((new JobApplicationRequest())->rules());

        $application = $job
            ? $job->applications()->findOrFail($id)
            : JobApplication::findOrFail($id);

        $application->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Application updated successfully!',
            'data' => $application
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */
    public function destroy(Job $job = null, $id)
    {
        $application = $job
            ? $job->applications()->findOrFail($id)
            : JobApplication::findOrFail($id);

        $application->delete();

        return response()->json([
            'success' => true,
            'message' => 'Application deleted successfully!'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | STATUS UPDATE
    |--------------------------------------------------------------------------
    */
    public function manageStatus(Request $request, Job $job = null, $id)
    {
        $request->validate([
            'status' => 'required|in:applied,shortlisted,rejected'
        ]);

        $application = $job
            ? $job->applications()->findOrFail($id)
            : JobApplication::findOrFail($id);

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
        dd($user);
        if (!$profile) {
            return response()->json([
                'success' => false,
                'message' => 'Please complete your job seeker profile before applying.'
            ], 422);
        }

        $alreadyApplied = JobApplication::where('job_id', $job->id)
            ->where('job_seeker_profile_id', $profile->id)
            ->exists();

        if ($alreadyApplied) {
            return response()->json([
                'success' => false,
                'message' => 'You have already applied for this job.'
            ], 409);
        }

        $application = JobApplication::create([
            'job_id' => $job->id,
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

        $application = JobApplication::create([
            'job_id' => $job->id,
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
