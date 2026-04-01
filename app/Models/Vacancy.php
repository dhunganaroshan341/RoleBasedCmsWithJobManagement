<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_id',
        'custom_company_name',
        'custom_company_country',
        'title',
        'currency',
        'interview_date',
        'general_requirements',
        'vacancy_image',
        'description',
        'status',
    ];

    /**
     * A vacancy can have multiple jobs.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }
    public function categories()
    {
        return $this->belongsToMany(
            JobCategory::class,
            'job_category_vacancy',
            'vacancy_id',
            'job_category_id'
        );
    }
    /**
     * Optional: Get the company info, whether existing or custom.
     */
    public function company()
    {
        return $this->belongsTo(Client::class);
    }

    public function setVacancyImageAttribute($value)
    {
        if (!$value) {
            $this->attributes['vacancy_image'] = null;
            return;
        }

        // remove any leading "uploads/" if user passes full path
        $value = str_replace('uploads/', '', $value);

        $this->attributes['vacancy_image'] = $value;
    }
}
