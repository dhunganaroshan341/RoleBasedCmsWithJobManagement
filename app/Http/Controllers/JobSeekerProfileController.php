<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\JobSeekerProfile;

class JobSeekerProfileController extends Controller
{
    /**
     * Show the CV upload / create form.
     */
    public function create(Request $request)
    {
        $jobId = $request->query('job_id'); // optional
        $job = $jobId ? Job::find($jobId) : null;

        return view('frontend.pages.jobseeker.upload-resume', compact('job'));
    }


    /**
     * Store a new Job Seeker profile.
     */


    public function store(Request $request, Job $job = null)
    {
        // Validate input, including password confirmation
        $validated = $request->validate([
            // user
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',

            // personal
            'age' => 'nullable|integer|min:0|max:100',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'contact_person' => 'nullable|string|max:255',
            'gender' => 'nullable|in:Male,Female,Other',
            'marital_status' => 'nullable|in:Married,Unmarried,Divorced',

            // next of kin
            'nok_first' => 'nullable|string|max:100',
            'nok_middle' => 'nullable|string|max:100',
            'nok_last' => 'nullable|string|max:100',
            'nok_relationship' => 'nullable|string|max:100',

            // passport
            'passport_no' => 'nullable|string|max:100',
            'place_of_issue' => 'nullable|string|max:150',
            'passport_issue_date' => 'nullable|date',
            'passport_expiry_date' => 'nullable|date',

            // physical
            'height' => 'nullable|numeric|min:0|max:300',
            'weight' => 'nullable|numeric|min:0|max:500',
            'medical_status' => 'nullable|in:Fit,Unfit,Waiting',

            // education
            'high_school' => 'nullable|string|max:255',
            'college' => 'nullable|string|max:255',
            'university' => 'nullable|string|max:255',
            'institute' => 'nullable|string|max:255',
            'training' => 'nullable|string|max:255',

            // experience
            'experience' => 'nullable|string',

            // languages
            'english' => 'nullable|in:Good,Very Good,Excellent',
            'malay' => 'nullable|in:Good,Very Good,Excellent',
            'japanese' => 'nullable|in:Good,Very Good,Excellent',
            'arabic' => 'nullable|in:Good,Very Good,Excellent',
            'hindi' => 'nullable|in:Good,Very Good,Excellent',
            'other_language' => 'nullable|string|max:100',

            // interview
            'interview_status' => 'nullable|in:Pass,Fail,Waiting',
            'grade' => 'nullable|string|max:10',

            // file
            'resume_file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);
        // Create the user
        $user = User::create([
            'full_name' => $validated['name'],
            'email'     => $validated['email'],
            'phone'     => $validated['phone'],
            'role'      => 'User',
            'password'  => Hash::make($validated['password']),
        ]);

        // Handle resume upload
        $resumePath = $request->file('resume_file')->store('resumes', 'public');

        // Create job seeker profile
        JobSeekerProfile::create([
            'user_id' => $user->id,

            // basic
            'full_name' => $validated['name'],
            'email' => $validated['email'],
            'contact_no' => $validated['phone'],

            // personal
            'age' => $request->age,
            'dob' => $request->dob,
            'address' => $request->address,
            'contact_person' => $request->contact_person,
            'gender' => $request->gender,
            'marital_status' => $request->marital_status,

            // JSON fields
            'next_of_kin' => json_encode([
                'first' => $request->nok_first,
                'middle' => $request->nok_middle,
                'last' => $request->nok_last,
                'relationship' => $request->nok_relationship,
            ]),

            'passport_detail' => json_encode([
                'number' => $request->passport_no,
                'place_of_issue' => $request->place_of_issue,
                'date_of_issue' => $request->passport_issue_date,
                'expiry_date' => $request->passport_expiry_date,
            ]),

            'height' => $request->height,
            'weight' => $request->weight,
            'medical_status' => $request->medical_status,

            'education' => json_encode([
                'high_school' => $request->high_school,
                'college' => $request->college,
                'university' => $request->university,
                'institute' => $request->institute,
                'training' => $request->training,
            ]),

            'experience' => $request->experience,

            'languages' => json_encode([
                'english' => $request->english,
                'malay' => $request->malay,
                'japanese' => $request->japanese,
                'arabic' => $request->arabic,
                'hindi' => $request->hindi,
                'other' => $request->other_language,
            ]),

            'interview_status' => $request->interview_status,
            'grade' => $request->grade,

            // file
            'resume_file' => $request->file('resume_file')->store('resumes', 'public'),
        ]);

        // Automatically log in the user
        Auth::login($user);

        // Redirect to home/dashboard after login
        return redirect()->route('home')->with('success', 'User registered and logged in successfully!');
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
            'name'        => 'required|string|max:255',
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
            'full_name'  => $validated['name'],
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
