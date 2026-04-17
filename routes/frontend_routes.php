<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DynamicPageController;
use App\Http\Controllers\EmployerJobRequestController;
use App\Http\Controllers\JobSeekerProfileController;
use App\Http\Controllers\UserFrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\JobApplyController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\SolutionsController;



Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('first.index');
});

//  blog
Route::prefix('blog')->group(function () {
    Route::controller(BlogController::class)->group(function () {
        Route::get('/', 'blog')->name('blog');
        Route::get('/blog/category/{slug}', 'blogsByCategory')->name('blogsByCategory');
        Route::get('/{slug}', 'blogDetail')->name('blogDetail');
        Route::get('/1', 'blogDetail')->name('blogDetailStatic');
    });
});

//  home
Route::prefix('home')->group(function () {
    Route::controller(homeController::class)->group(function () {
        Route::get('/about', 'about')->name('about');
        Route::get('/contact', 'contact')->name('contact');
        Route::get('/', 'index')->name('index');
    });
});
Route::post('/contact', [UserFrontendController::class, 'storeContactUs'])
    ->middleware('throttle:form-submission')
    ->name('contact.store');

//  job
Route::prefix('pages')->group(function () {
    Route::prefix('job')->group(function () {
        Route::controller(PagesController::class)->group(function () {
            Route::get('/job', 'job')->name('job');
            Route::get('/job-2', 'job2')->name('job2'); //kinda like job grid
            Route::get('/job-3', 'job3')->name('job3');
            Route::get('/job-4', 'job4')->name('job4');
            Route::get('/job-detaails', 'jobDetails')->name('jobDetails');
        });
    });
});
Route::controller(PagesController::class)->group(function () {
    Route::get('/jobs', 'job3')->name('jobs');
    Route::get('/jobs/{id}', 'jobDetailsById')->name('jobById');

    Route::get('/hire', 'job')->name('hire');
});
Route::post('/jobs/{id}/apply', [JobApplyController::class, 'manualApply'])
    ->name('jobseeker.mannualApply');

// Smart/auto apply route (for logged-in users)
Route::post('/jobs/{id}/smart-apply', [JobApplyController::class, 'smartApply'])
    ->name('jobseeker.smartApply')
    ->middleware('auth'); // Only authenticated users

Route::post('/hire', [EmployerJobRequestController::class, 'store'])->name('hire.submit');
//  portfoliyo



//  portfoliyo
Route::prefix('pages')->group(function () {
    Route::controller(PagesController::class)->group(function () {
        Route::get('/portfolio', 'portfolio')->name('portfolio');
        Route::get('/page-error', 'pageError')->name('pageError');
        Route::get('/faq', 'faq')->name('faq');
        Route::get('/signup', 'signup')->name('signup');
        Route::get('/team', 'team')->name('team');
        Route::get('/testimonial', 'testimonial')->name('testimonial');
        // Show the form (same blade, will use @guest / @auth to adapt)

    });

    //  portfoliyo

});
Route::get('/cv-upload', [JobSeekerProfileController::class, 'create'])
    ->middleware('guest')       // only guests can access
    ->name('jobseeker.create');



// Handle form submission
Route::post('/cv-upload', [JobSeekerProfileController::class, 'store'])
    ->name('jobseeker.store');
// Dynamic pages
Route::get('/company-overview', [DynamicPageController::class, 'companyOverview'])->name('company-overview');
Route::get('/message-from-chairman', [DynamicPageController::class, 'messageFromChairman'])->name('message-from-chairman');
Route::get('/license-certificates', [DynamicPageController::class, 'licenseCertificates'])->name('license-certificates');
Route::get('/organizational-chart', [DynamicPageController::class, 'organizationalChart'])->name('organizational-chart');

Route::get('/required-documents', [DynamicPageController::class, 'requiredDocuments'])->name('required-documents');
Route::get('/recruitment-process', [DynamicPageController::class, 'recruitmentProcess'])->name('recruitment-process');
// Route::get('/categories', [DynamicPageController::class,'categories'])->name('dynamic-categories');
Route::get('/categories', [PagesController::class, 'categories'])->name('dynamic-categories');
// Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('login', [AuthController::class, 'userLogin'])->name('front.login');
Route::post('front/login/store', [AuthController::class, 'storeUserLogin'])->name('front.login.store');
