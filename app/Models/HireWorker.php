<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HireWorker extends Model
{
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'phone',
        'company_name',
        'web_url',
        'industry',
        'location',
        'position',
        'openings',
        'salary_range',
        'job_description',
        'status'
    ];
}
