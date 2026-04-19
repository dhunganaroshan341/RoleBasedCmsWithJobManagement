<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Testimonial;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'name' => 'Ramesh Kumar Sharma',
                'designation' => 'Construction Worker, UAE',
                'address' => 'Kathmandu, Nepal',
                'description' => 'The recruitment process was very smooth and transparent. Aurora helped me get a job in UAE within a short time, and they guided me through every step from documentation to departure.',
                'image' => null,
            ],
            [
                'name' => 'Sita Rai',
                'designation' => 'Housekeeping Staff, Qatar',
                'address' => 'Lalitpur, Nepal',
                'description' => 'I had a great experience with Aurora. The staff was very supportive and always updated me about my visa process. I am now working in Qatar with good salary and safe environment.',
                'image' => null,
            ],
            [
                'name' => 'Bikash Thapa',
                'designation' => 'Security Guard, Saudi Arabia',
                'address' => 'Pokhara, Nepal',
                'description' => 'Aurora Nepal made my foreign job journey easy. They provided proper orientation and ensured all my documents were ready on time. I am satisfied with their service.',
                'image' => null,
            ],
            [
                'name' => 'Anita Gurung',
                'designation' => 'Caregiver, Malaysia',
                'address' => 'Chitwan, Nepal',
                'description' => 'The team was very professional and honest. I was nervous at first, but they explained everything clearly and helped me secure a good caregiving job in Malaysia.',
                'image' => null,
            ],
            [
                'name' => 'Sanjay Magar',
                'designation' => 'Factory Worker, Japan',
                'address' => 'Butwal, Nepal',
                'description' => 'Excellent service from Aurora. They handled everything from interview preparation to visa processing. Now I am working in Japan and thankful for their support.',
                'image' => null,
            ],
        ];

        foreach ($testimonials as $data) {
            Testimonial::create($data);
        }
    }
}
