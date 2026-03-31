<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Update this if you want permission checks
    }

    public function rules()
    {
        return [
            'title'             => 'required|string|max:255',
            'job_code'          => 'nullable|string|max:50|unique:jobs,job_code,' . $this->job?->id,
            'custom_company_name' => 'nullable|string|max:255',
            'description'       => 'nullable|string|min:10',
            'requirements'      => 'nullable|string|min:5',
            'location'          => 'nullable|string|max:255',
            'salary'            => 'nullable|numeric|min:0',
            'our_country_id'    => 'nullable|exists:our_countries,id',
            'vacancy_id'    => 'required|exists:vacancies,id',
            'employer_id'       => 'nullable|exists:employers,id',
            'category_ids'      => 'nullable|array',
            'category_ids.*'    => 'exists:job_categories,id',
            'interview_date'    => 'nullable|date',
            'status'            => 'required|in:Active,Inactive',
            'link'              => 'nullable|url|max:255',
            'icon_class'        => 'nullable|string|max:100',
            'image'             => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // 2MB max
            'pdf'               => 'nullable|mimes:pdf|max:5120', // 5MB max
            'openings_mode'     => 'required|in:total,male-female',
            'total_openings'    => 'nullable|integer|min:0',
            'male_opening'      => 'nullable|integer|min:0',
            'female_opening'    => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'title.required'       => 'The job title is required.',
            // 'description.required' => 'Please provide a job description.',
            'vacancy_id.required'    => 'Vacancy is required.',
            'job_code.unique'      => 'This job code is already in use.',
            'our_country_id.exists' => 'Selected country is invalid.',
            'employer_id.exists'   => 'Selected employer is invalid.',
            'category_ids.*.exists' => 'One or more selected categories are invalid.',
            'status.in'            => 'Status must be either active or inactive.',
            'link.url'             => 'Please enter a valid URL.',
            'image.image'          => 'Uploaded file must be an image.',
            'image.mimes'          => 'Image must be jpeg, png, jpg, gif or webp.',
            'pdf.mimes'            => 'PDF must be a valid pdf file.',
            'openings_mode.in'     => 'Invalid openings input mode selected.',
            'total_openings.integer' => 'Total openings must be a number.',
            'male_opening.integer' => 'Male openings must be a number.',
            'female_opening.integer' => 'Female openings must be a number.',
        ];
    }
}
