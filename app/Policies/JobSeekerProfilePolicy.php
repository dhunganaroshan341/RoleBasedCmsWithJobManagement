<?php

// app/Policies/JobSeekerProfilePolicy.php

use App\Models\User;

class JobSeekerProfilePolicy
{
    public function create(User $user)
    {
        // allow only if user DOES NOT have profile
        return $user->jobSeekerProfile === null;
    }

    public function hasProfile(User $user)
    {
        return $user->jobSeekerProfile !== null;
    }
}
