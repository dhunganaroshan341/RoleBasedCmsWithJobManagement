<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacancy;
use App\Models\Job;
use App\Models\JobCategory;
use Illuminate\Support\Str;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $categories = JobCategory::all();

        if ($categories->count() === 0) {
            $this->command->warn('⚠️ No categories found. Run JobCategorySeeder first.');
            return;
        }

        $titles = [
            'Construction Supervisor',
            'Electrical Engineer',
            'Mechanical Technician',
            'Security Guard',
            'Chef de Partie',
            'AC Technician',
            'Project Manager',
            'Waiter / Waitress',
            'Forklift Operator',
            'Crane Operator',
        ];

        foreach ($titles as $title) {

            // ✅ Create Vacancy
            $vacancy = Vacancy::create([
                'company_id'              => null,
                'custom_company_name'     => fake()->company(),
                'custom_company_country'  => fake()->country(),
                'title'                   => $title . ' Hiring',
                'currency'                => 'NPR',
                'interview_date'          => now()->addDays(rand(5, 20)),
                'general_requirements'    => fake()->sentence(10),
                'vacancy_image'           => 'default.png',
                'description'             => fake()->paragraph(3),
                'status'                  => 'Active',
            ]);

            // ✅ Attach Categories to Vacancy
            $selectedCategories = $categories->random(rand(1, 3));

            $vacancy->categories()->attach(
                $selectedCategories->pluck('id')->toArray()
            );

            // ✅ Create multiple jobs under this vacancy
            $jobCount = rand(2, 5);

            for ($i = 0; $i < $jobCount; $i++) {

                $job = Job::create([
                    'vacancy_id'     => $vacancy->id,
                    'custom_company_name' => $vacancy->custom_company_name,

                    'male_opening'   => rand(1, 10),
                    'female_opening' => rand(1, 10),
                    'total_openings' => rand(2, 20),

                    'title'          => $title,
                    'description'    => fake()->paragraph(2),
                    'requirements'   => fake()->sentence(8),

                    'interview_date' => $vacancy->interview_date,
                    'location'       => fake()->city(),

                    'salary'         => 'NPR ' . rand(15000, 60000),
                    'status'         => 'Active',
                    'job_code'       => strtoupper(Str::random(6)),
                    'slug'           => Str::slug($title . '-' . Str::random(3)),

                    'image'          => null,
                    'pdf'            => null,
                    'link'           => null,
                    'icon_class'     => 'fa-solid fa-briefcase',
                    'our_country_id' => rand(1, 72),
                ]);

                // ✅ Optional: also attach categories to job (if still needed)
                $job->categories()->attach(
                    $selectedCategories->pluck('id')->toArray()
                );
            }
        }

        $this->command->info('✅ Vacancies with jobs created successfully!');
    }
}
