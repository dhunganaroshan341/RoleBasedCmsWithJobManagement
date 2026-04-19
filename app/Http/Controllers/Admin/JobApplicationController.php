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
        if ($request->ajax()) {

            $applications = $this->applicationService->getApplications($job);

            return DataTables::of($applications)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    return $row['name'];
                })

                ->addColumn('email', function ($row) {
                    return $row['email'];
                })

                ->addColumn('phone', function ($row) {
                    return $row['phone'];
                })

                ->addColumn('job', function ($row) {
                    return $row['job']['title'] ?? 'N/A';
                })

                ->addColumn('status', function ($row) {
                    return '<span class="badge bg-info">' . ucfirst($row['status']) . '</span>';
                })

                ->addColumn('action', function ($row) {
                    return '
                    <div class="dropdown">

                        <button class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <button class="dropdown-item viewApplicationBtn" data-id="' . $row['id'] . '">
                                    <i class="bi bi-eye me-2"></i> View
                                </button>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <button class="dropdown-item text-danger deleteApplicationBtn" data-id="' . $row['id'] . '">
                                    <i class="bi bi-trash me-2"></i> Delete
                                </button>
                            </li>

                        </ul>

                    </div>
                ';
                })

                ->rawColumns(['status', 'action'])
                ->make(true);
        }
        $extraJs = array_merge(
            config('js-map.admin.datatable.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style')
        );

        return view('Admin.pages.JobApplicationDatatable.index', compact('extraCs', 'extraJs'));
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
        $application = JobApplication::findOrFail($id);

        $this->applicationService->deleteApplication($application);

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
