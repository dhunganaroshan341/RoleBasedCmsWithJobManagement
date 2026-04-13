<?php

namespace App\Http\Controllers;

use App\Helpers\ConuntryHelperEnhanced;
use App\Helpers\CountryHelper;
use App\Models\PackageBooking;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    /**
     * Show the form for creating a new resource.
     */
    public function index($tourPackageId, Request $request)
    {
        if ($request->ajax()) {
            $query = PackageBooking::where('tour_package_id', $tourPackageId)->latest();

            return DataTables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function ($item) {
                    return '
                    <div class="d-flex gap-1">
                        <button class="btn btn-sm btn-lighteditTourBatchBtn" data-id="' . $item->id . '">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm text-danger deleteTourBatchBtn" data-id="' . $item->id . '">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </div>
                ';
                });
        }

        // Optional full page load for fallback or debugging
        $tourPackage = TourPackage::findOrFail($tourPackageId);
        return view('Admin.pages.TourBatch.index', compact('tourPackage'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageBooking $packageBooking)
    {
        //
    }
    public function bookingSinglePage()
    {
        $packages = TourPackage::with(['batches' => function ($query) {
            $query->where('available_seats', '>', 0); // Only batches with available seats
        }])->where('status', 'Active')->get();

        $countries = ConuntryHelperEnhanced::getCountries(); // Assuming you’re loading a config array
        return view('frontend.booking', compact('packages', 'countries'));
    }
}
