<?php

namespace App\Services;

use App\Models\JobApplication;

class ApplicationService
{
    public function getApplications($job = null)
    {
        $query = JobApplication::with(['job', 'jobSeekerProfile']);

        if ($job) {
            $query->where('job_id', $job->id);
        }

        return $query->latest()->get()->map(function ($app) {

            $profile = $app->jobSeekerProfile;
            dd($profile->toArray());
            return [
                'id' => $app->id,

                'name' => $app->name ?: optional($profile)->name,
                'email' => $app->email ?: optional($profile)->email,
                'phone' => $app->phone ?: optional($profile)->phone,
                'bio' => $app->bio ?: optional($profile)->bio,
                'resume' => $app->resume_file ?: optional($profile)->resume_file,

                'status' => $app->status,

                'job' => [
                    'id' => optional($app->job)->id,
                    'title' => optional($app->job)->title,
                ],
            ];
        });
    }
}
