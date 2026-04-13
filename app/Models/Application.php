<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = ['job_id', 'job_seeker_id', 'cover_letter', 'status'];

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function jobSeeker()
    {
        return $this->belongsTo(JobSeekerProfile::class, 'job_seeker_id');
    }

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class);
    }
}
