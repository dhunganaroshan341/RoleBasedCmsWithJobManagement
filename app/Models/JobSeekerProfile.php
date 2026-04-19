<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobSeekerProfile extends Model
{
    protected $fillable = [
        'user_id',

        'full_name',
        'email',
        'contact_no',
        'address',

        'bio',

        'education',
        'experience',

        'resume_file',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_seeker_id');
    }
}
