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
        // dd($applications->toArray());
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
}
