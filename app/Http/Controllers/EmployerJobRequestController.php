<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HireWorker;

class EmployerJobRequestController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname'           => 'required|string|max:255',
            'lname'           => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:20',

            'company_name'    => 'required|string|max:255',
            'web_url'         => 'nullable|url|max:255',
            'industry'        => 'required|string|max:255',
            'location'        => 'required|string|max:255',

            'position'        => 'required|string|max:255',
            'openings'        => 'required|string|max:255',
            'salary_range'    => 'required|string|max:255',
            'salary_range_to' => 'required|string|max:255',
            'job_description' => 'required|string',
        ]);

        HireWorker::create($validated);

        return redirect()->back()->with('success', 'Your request has been submitted successfully!');
    }
}
