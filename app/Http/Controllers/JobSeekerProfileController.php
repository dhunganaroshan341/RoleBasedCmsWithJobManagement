<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JobSeekerProfile;
use Illuminate\Support\Facades\DB;

class JobSeekerProfileController extends Controller
{
    /**
     * Show the CV upload / create form.
     */
    public function create(Request $request)
    {
        $jobId = $request->query('job_id'); // optional
        $job = $jobId ? Job::find($jobId) : null;

        return view('frontend.pages.jobseeker.cv-upload', compact('job'));
    }


    /**
     * Store a new Job Seeker profile.
     */


    public function store(Request $request, Job $job = null)
    {

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|digits:10',
            'password' => 'required|string|min:6|confirmed',

            'address' => 'nullable|string|max:255',

            'education' => 'required|string',
            'skills' => 'required|string',
            'experience' => 'required|integer|min:0|max:50',
            'bio' => 'nullable|string',

            'resume_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        DB::beginTransaction();

        try {
            // Create user
            $user = User::create([
                'full_name' => $validated['full_name'],
                'email'     => $validated['email'],
                'phone'     => $validated['phone'],
                'role'      => 'User',
                'password'  => Hash::make($validated['password']),
            ]);

            // Upload once (IMPORTANT: avoid duplicate upload)
            $resumePath = $request->file('resume_file')->store('resumes', 'public');

            // Create profile
            JobSeekerProfile::create([
                'user_id' => $user->id,

                'full_name' => $validated['full_name'],
                'email' => $validated['email'],
                'contact_no' => $validated['phone'],

                'address' => $validated['address'],

                'education' => json_encode([
                    'level' => $validated['education'],
                    'skills' => $validated['skills'],
                ]),

                'experience' => $validated['experience'],
                'resume_file' => $resumePath,
            ]);

            DB::commit();

            Auth::login($user);

            return redirect()->route('index')
                ->with('success', 'User registered and logged in successfully!');
        } catch (\Exception $e) {
            DB::rollBack();

            return back()->withErrors([
                'error' => 'Something went wrong. Please try again.',
                'message' => $e->getMessage(),

            ])->withInput();
        }
    }

    /**
     * Show a Job Seeker profile (read).
     */
    public function show($id)
    {
        $profile = JobSeekerProfile::with('user')->findOrFail($id);
        return view('frontend.pages.jobseeker.view-profile', compact('profile'));
    }

    /**
     * Show the edit form for a Job Seeker profile.
     */
    public function edit($id)
    {
        $profile = JobSeekerProfile::with('user')->findOrFail($id);
        return view('frontend.pages.jobseeker.upload-resume', compact('profile'));
    }

    /**
     * Update an existing Job Seeker profile.
     */
    public function update(Request $request, $id)
    {
        $profile = JobSeekerProfile::findOrFail($id);
        $user = $profile->user;

        $validated = $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'       => 'required|email|max:255',
            'phone'       => 'required|string|max:20',
            'bio'         => 'nullable|string',
            'skills'      => 'nullable|string',
            'experience'  => 'nullable|string',
            'education'   => 'nullable|string',
            'resume_file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'password'    => 'nullable|string|confirmed|min:6',
        ]);

        // Update user info
        $user->update([
            'full_name'  => $validated['full_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        if (!empty($validated['password'])) {
            $user->update(['password' => Hash::make($validated['password'])]);
        }

        // Update resume if uploaded
        if ($request->hasFile('resume_file')) {
            $validated['resume_file'] = $request->file('resume_file')->store('resumes', 'public');
        }

        $profile->update([
            'bio'         => $validated['bio'] ?? $profile->bio,
            'skills'      => $validated['skills'] ?? $profile->skills,
            'experience'  => $validated['experience'] ?? $profile->experience,
            'education'   => $validated['education'] ?? $profile->education,
            'resume_file' => $validated['resume_file'] ?? $profile->resume_file,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
