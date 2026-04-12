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
            dd($data);
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('name', function ($row) {
                    return $row->fname . ' ' . $row->lname;
                })

                ->addColumn('position', function ($row) {
                    return Str::limit($row->position, 30);
                })

                ->addColumn('company_name', function ($row) {
                    return Str::limit($row->company_name, 30);
                })

                ->addColumn('action', function ($row) {
                    return '
                        <button class="btn btn-dark viewHireBtn" data-id="' . $row->id . '">View</button>
                        <button class="btn btn-danger deleteHireBtn" data-id="' . $row->id . '">Delete</button>
                    ';
                })

                ->rawColumns(['action'])
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
