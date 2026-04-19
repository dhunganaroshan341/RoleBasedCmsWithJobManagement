<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplyController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | SMART APPLY (AUTH USER)
    |--------------------------------------------------------------------------
    */
    public function smartApply($id)
    {
        $job = Job::find($id);
        // dd($job->toArray()); 
        $user = auth()->user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'Please login first.'
            ], 401);
        }

        $profile = $user->jobSeekerProfile;

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
            'status' => 'Pending',
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
            'phone' => ['required', 'regex:/^[0-9]{7,12}$/'], // 🔥 fixed validation
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
            'status' => 'Pending',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Your application has been submitted successfully!',
            'data' => $application
        ]);
    }
}
