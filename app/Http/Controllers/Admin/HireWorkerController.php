<?php

namespace App\Http\Controllers\Admin;

use App\Models\HireWorker;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class HireWorkerController extends Controller
{
    // ====================== INDEX ======================
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = HireWorker::query();

            return DataTables::of($data)
                ->addIndexColumn()

                // Full name from form
                ->addColumn('name', function ($row) {
                    return $row->fname . ' ' . $row->lname;
                })

                // Contact info
                ->addColumn('contact', function ($row) {
                    return $row->email . '<br><small>' . $row->country_code . ' ' . $row->phone . '</small>';
                })

                // Company block
                ->addColumn('company', function ($row) {
                    return '
                    <strong>' . e($row->company_name) . '</strong><br>
                    <small>' . e($row->industry) . '</small><br>
                    <small>' . e($row->location) . '</small>
                ';
                })

                // Job info block
                ->addColumn('job', function ($row) {
                    return '
                    <strong>' . e($row->position) . '</strong><br>
                    <small>Openings: ' . $row->openings . '</small><br>
                    <small>' . $row->currency . ' ' . $row->salary_range . ' - ' . $row->salary_range_to . '</small>
                ';
                })

                // Description
                ->addColumn('description', function ($row) {
                    return Str::limit($row->job_description, 50);
                })

                // Actions dropdown (clean UI)
                ->addColumn('action', function ($row) {
                    return '
                    <div class="dropdown">
                        <button class="btn btn-sm text-dark dropdown-toggle" data-bs-toggle="dropdown">
                           ...
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
                                <button class="dropdown-item viewHireBtn" data-id="' . $row->id . '">
                                    <i class="bi bi-eye me-2"></i> View
                                </button>
                            </li>

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <button class="dropdown-item text-danger deleteHireBtn" data-id="' . $row->id . '">
                                    <i class="bi bi-trash me-2"></i> Delete
                                </button>
                            </li>

                        </ul>
                    </div>
                ';
                })

                ->rawColumns(['contact', 'company', 'job', 'action'])
                ->make(true);
        }
        $extraJs = array_merge(
            config('js-map.admin.datatable.script')
        );

        $extraCs = array_merge(
            config('js-map.admin.datatable.style')
        );

        return view('Admin.pages.HireWorker.hire-worker', compact('extraJs', 'extraCs'));
    }

    // ====================== SHOW ======================
    public function show($id)
    {
        try {
            $data = HireWorker::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    // ====================== DESTROY ======================
    public function destroy($id)
    {
        try {
            HireWorker::findOrFail($id)->delete();

            return response()->json([
                'success' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
