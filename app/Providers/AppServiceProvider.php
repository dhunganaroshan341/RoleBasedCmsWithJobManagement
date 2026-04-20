<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\frontend;
use App\Models\Itinerary;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Vacancy;
use App\Models\VideoSection;
use App\Models\WorkingDay;
use Illuminate\Pagination\Paginator;
// use Illuminate\Routing\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Observers\ItineraryObserver;
use App\Services\GreetingService;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->share('greetingService', app(GreetingService::class));
        // Itinerary::observe(ItineraryObserver::class);
        $this->composeFrontendViews([
            'frontend.layout.main',
            // 'frontend.layouts.layout',
            'frontend.layout.footer',
            'frontend.contact',
            'frontend.home.index', // 👈 ADD THIS
        ]);

        $this->composeFrontendViews([
            'frontend-tailwind.layout.main',
            'frontend-tailwind.layout.footer',
            'frontend-tailwind.contact'
        ]);

        Paginator::useBootstrapFive();
    }

    protected function composeFrontendViews(array $views): void
    {
        View::composer($views, function ($view) {
            $setting = Setting::first();
            $services = Service::where('status', 1)->latest()->take(4)->get();
            $latestVacancies = Vacancy::withCount('jobs')->latest()->take(5)->get();
            $view->with([
                'email' => $setting->email ?? '',
                'title' => $setting->title ?? '',
                'address' => $setting->address ?? '',
                'contact' => $setting->contact ?? '',
                'description' => $setting->description ?? '',
                'logo' => $setting->logo ?? '',
                'work_description' => $setting->work_description ?? '',
                'about_description' => $setting->about_description ?? '',
                'welcome_description' => $setting->welcome_description ?? '',
                'welcome_image' => $setting->welcome_image ?? '',
                'about_image' => $setting->about_image ?? '',
                'facebook' => $setting->facebook_url ?? '',
                'twitter' => $setting->twitter_url ?? '',
                'instagram' => $setting->instagram_url ?? '',
                'github' => $setting->github_url ?? '',
                'workdesc' => WorkingDay::all(),
                'services' => $services,
                'latestVacancies' => $latestVacancies,
                'latestNewsTitle' => Str::words(frontend::latest()->first()->title ?? '', 4),
                'homeSectionOneVideos' => VideoSection::where('section', 'home_1')->first(),
                'homeSectionTwoVideos' => VideoSection::where('section', 'home_2')->first(),

            ]);
        });
    }
}
