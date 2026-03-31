<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'About Aurora Human Resource Pvt. Ltd.',
                'description' => 'Aurora Human Resource Pvt. Ltd. is a leading manpower recruitment agency in Nepal, dedicated to connecting skilled Nepali workers with international employment opportunities.

With a strong understanding of global labor markets, Aurora provides reliable recruitment solutions for employers and safe, legal opportunities for job seekers. The company focuses on transparency, professionalism, and efficiency in every step of the recruitment process.

By following government regulations and maintaining ethical practices, Aurora has built trust among both clients and candidates over the years.'
            ],
            [
                'title' => 'The Growing Demand for Nepali Workforce Abroad',
                'description' => 'Nepal has become a significant source of skilled and hardworking manpower for international markets. Countries like the UAE, Qatar, Malaysia, and Japan actively recruit workers from Nepal.

Nepali workers are known for their dedication, adaptability, and strong work ethic. As global demand continues to rise, Nepali manpower plays an important role in industries such as construction, hospitality, manufacturing, and security services.'
            ],
            [
                'title' => 'Why Foreign Employers Prefer Nepali Workers',
                'description' => 'Employers around the world are increasingly choosing Nepali workers for their businesses.

Key reasons include high reliability, cost-effectiveness, willingness to learn, and a positive work attitude. Nepali workers have proven their capabilities across multiple industries, making them a preferred choice globally.

Aurora ensures employers receive skilled and well-prepared candidates.'
            ],
            [
                'title' => 'A Guide for Nepali Job Seekers Looking to Work Abroad',
                'description' => 'Working abroad can be a life-changing opportunity, but proper planning is essential.

Candidates should verify recruitment agencies, understand job roles, review contracts, and prepare necessary documents carefully. Following legal procedures helps ensure safety and success.

Aurora supports candidates from application to final deployment.'
            ],
            [
                'title' => 'The Importance of Legal Recruitment Process in Nepal',
                'description' => 'Foreign employment in Nepal is regulated to protect workers and ensure fair practices.

A legal recruitment process includes proper approval, verified documentation, transparent contracts, and government clearance. These steps help prevent fraud and ensure worker safety.

Aurora strictly follows all legal requirements for smooth recruitment.'
            ],
            [
                'title' => 'How Aurora Simplifies International Recruitment',
                'description' => 'International recruitment involves multiple steps including sourcing, screening, documentation, and deployment.

Aurora simplifies this process by offering end-to-end recruitment solutions, ensuring efficiency and compliance. Employers save time while candidates get placed in the right roles.

Our goal is to create a seamless experience for both employers and job seekers.'
            ],
        ];

        foreach ($posts as $post) {
            Post::create($post);
        }
    }
}
