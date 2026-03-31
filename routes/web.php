<?php

use App\Http\Controllers\Admin\AchievementController;
use  App\Http\Controllers\Admin\BannerSliderVideoController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\CallToActionController;
use App\Http\Controllers\Admin\ItineraryController;
use App\Http\Controllers\Admin\PriceIncludesController;
use App\Http\Controllers\Admin\SectionCategoryController;
use App\Http\Controllers\Admin\ServiceQueryController;
use App\Http\Controllers\Admin\TourPackageController as AdminTourPackageController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeSliderController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\FrontendController as AdminFrontendController;
use App\Http\Controllers\Admin\GalleryAlbumController;
use App\Http\Controllers\Admin\GalleryMediaController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\NewsLetterController as AdminSideNewsLetterController;
use App\Http\Controllers\Admin\PageBannerController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\VacancyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\TourPackageController;
use App\Http\Controllers\FrontGalleryController;
use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\PackageBookingController;
use App\Http\Controllers\UserFrontendController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\SectionCategoryController as AdminSectionCategoryController;
use App\Http\Controllers\Admin\SectionContentController as AdminSectionContentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Auth routes with isLogin middleware
Route::middleware('isLogin')->group(function () {

    Route::get('/register', [AuthController::class, 'index'])->name('register');
    Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

    Route::get('/admin/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/store', [AuthController::class, 'storeLogin'])->name('login.store');

    Route::get('/auth/google/redirect', function () {
        return Socialite::driver('google')->redirect();
    })->name('google.redirect');

    Route::get('/auth/google/callback', function (Request $request) {
        $userdata = Socialite::driver('google')->user();
        $user = User::updateOrCreate(
            ['google_id' => $userdata->id],
            [
                'full_name' => $userdata->name,
                'email' => $userdata->email,
                'role' => 'User',
                'image' => $userdata->avatar,
            ]
        );
        Auth::login($user);
        return redirect()->route('first.index');
    })->name('google.callback');
});

// Admin routes with admin middleware
Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard.index');
    // pages management
    Route::apiResource('pages', PageController::class);
    Route::get('/pages/status/{id}', [HomeSliderController::class, 'statusToggle'])->name('pages.status');

    // Section Category resource routes
    Route::apiResource('/section-category', AdminSectionCategoryController::class);
    Route::get('/section-categoy/status/{id}', [HomeSliderController::class, 'statusToggle'])->name('section-category.status');
    Route::post('/section-category/images/upload', [SectionCategoryController::class, 'uploadImages'])
        ->name('sectionCategory.images.upload');

    Route::delete('/section-category/images/delete/{id}', [SectionCategoryController::class, 'deleteImage'])
        ->name('sectionCategory.images.delete');
    // Section Content resource routes
    Route::apiResource('/section-content', AdminSectionContentController::class);
    Route::get('/section-content/status/{id}', [AdminSectionContentController::class, 'statusToggle'])->name('section-content.status');
    Route::get('/section-content/category/{id}', [AdminSectionContentController::class, 'category'])->name('section-content.category');
    Route::get('/section-content/category/{slug}', [AdminSectionContentController::class, 'categoryBySlug'])->name('section-content.category');
    // Route
    Route::get('/section-content/{categoryId}/list', [AdminSectionContentController::class, 'list']);
    Route::post('/section-content/reorder', [AdminSectionContentController::class, 'reorder']);

    // Users
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/latest-order', [UserController::class, 'latestOrder'])->name('user.latest-order');
    Route::post('/user/reset-password/{id}', [UserController::class, 'passwordReset'])->name('user.reset-password');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/detail/{id}', [UserController::class, 'userDetail'])->name('user.detail');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Home Slider
    Route::get('/home-slide', [HomeSliderController::class, 'index'])->name('homeslide');
    Route::post('/home-slide/store', [HomeSliderController::class, 'store'])->name('homeslide.store');
    Route::get('/home-slide/detail/{id}', [HomeSliderController::class, 'getHomeSliderDetail'])->name('homeslide.detail');
    Route::post('/home-slide/update/{id}', [HomeSliderController::class, 'update'])->name('homeslide.update');
    Route::get('/home-slide/delete/{id}', [HomeSliderController::class, 'destroy'])->name('homeslide.destroy');
    Route::get('/home-slide/status/{id}', [HomeSliderController::class, 'statusToggle'])->name('homeslide.status');



    Route::get('/banner/video', [BannerSliderVideoController::class, 'index'])->name('banner.video.index');
    Route::post('/banner/video', [BannerSliderVideoController::class, 'store'])->name('banner.video.store');

    // Frontend
    Route::get('/front-end', [AdminFrontendController::class, 'index'])->name('frontend');
    Route::post('/front-end', [AdminFrontendController::class, 'update'])->name('frontend.update');

    // Site Data
    Route::get('/site-data', [AdminFrontendController::class, 'siteData'])->name('siteData');
    Route::post('/site-data', [AdminFrontendController::class, 'updateSiteData'])->name('siteData.update');

    // Settings
    Route::get('/setting', [SettingController::class, 'index'])->name('setting');
    Route::post('/setting', [SettingController::class, 'store'])->name('setting.store');
    Route::get('/setting/working/{id}', [SettingController::class, 'destroyWorking'])->name('setting.working.destroy');
    Route::post('/setting/working', [SettingController::class, 'addWorking'])->name('setting.working.add');

    // Testimonial
    Route::get('/testimonial', [TestimonialController::class, 'index'])->name('testimonial');
    Route::post('/testimonial/store', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('/testimonial/detail/{id}', [TestimonialController::class, 'showDetail'])->name('testimonial.detail');
    Route::post('/testimonial/update/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::get('/testimonial/delete/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');
    Route::get('/testimonial/status/{id}', [TestimonialController::class, 'statusToggle'])->name('testimonial.status');

    Route::resource('achievements', AchievementController::class);
    Route::get('achievements/status/toggle/{id}', [AchievementController::class, 'statusToggle']);

    // Category
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/categories', [CategoryController::class, 'getCategories'])->name('categories.get');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/detail/{id}', [CategoryController::class, 'detailCategory'])->name('category.detail');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category/status/{id}', [CategoryController::class, 'statusToggle'])->name('category.status');

    // Post
    Route::get('/post', [PostController::class, 'index'])->name('post');
    Route::get('/post/get-data', [PostController::class, 'getPostData'])->name('post.data');
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');
    Route::get('/post/detail/{id}', [PostController::class, 'getDetail'])->name('post.detail');
    Route::post('/post/edit/{id}', [PostController::class, 'update'])->name('post.update');
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    Route::get('/post/image/delete', [PostController::class, 'destroyImage'])->name('post.image.destroy');
    Route::get('/post/status/{id}', [PostController::class, 'statusToggle'])->name('post.status');
    Route::get('/post/comment/detail/{id}', [PostController::class, 'postComment'])->name('post.comment');

    // Contact
    Route::get('/contact', [ContactController::class, 'index'])->name('contact');
    Route::get('/contact/get-data', [ContactController::class, 'getContact'])->name('contact.get-data');
    Route::get('/contact/detail/{id}', [ContactController::class, 'showDetail'])->name('contact.detail');
    Route::get('/contact/delete/{id}', [ContactController::class, 'destroy'])->name('contact.delete');

    // Service Query
    Route::get('/service-query', [ServiceQueryController::class, 'index'])->name('service-query');
    Route::get('/service-query/get-data', [ServiceQueryController::class, 'getServiceQuery'])->name('service-query.get-data');
    Route::get('/service-query/detail/{id}', [ServiceQueryController::class, 'showDetail'])->name('service-query.detail');
    Route::get('/service-query/delete/{id}', [ServiceQueryController::class, 'destroy'])->name('service-query.delete');

    // Notices
    Route::resource('/notice', NoticeController::class);
    Route::get('/notice/status/{id}', [NoticeController::class, 'toggleStatus'])->name('notice.status');

    // Services
    Route::resource('/service', ServiceController::class);
    Route::get('/service/status/{id}', [ServiceController::class, 'toggleStatus'])->name('service.status');

    // Call to Action
    Route::resource('call-to-action', CallToActionController::class);
    Route::post('call-to-action/image/delete', [CallToActionController::class, 'destroyImage'])->name('call-to-action.destroyImage');
    Route::put('call-to-action/{id}/status', [CallToActionController::class, 'statusToggle'])->name('call-to-action.status');
    Route::get('/get-call-to-action-data', [CallToActionController::class, 'all'])->name('call-to-action.all');

    // Gallery Albums
    Route::get('/gallery-albums', [GalleryAlbumController::class, 'index'])->name('gallery-albums.index');
    Route::get('/gallery-albums/data', [GalleryAlbumController::class, 'getData'])->name('gallery-albums.data');
    Route::post('/gallery-albums/{id}/upload', [GalleryAlbumController::class, 'upload'])->name('gallery-albums.upload');
    Route::post('/gallery-albums', [GalleryAlbumController::class, 'store'])->name('gallery-albums.store');
    Route::get('/gallery-albums/{id}/detail', [GalleryAlbumController::class, 'detailGalleryAlbum'])->name('gallery-albums.detail');
    Route::put('/gallery-albums/{id}', [GalleryAlbumController::class, 'update'])->name('gallery-albums.update');
    Route::delete('/gallery-albums/{id}', [GalleryAlbumController::class, 'destroy'])->name('gallery-albums.destroy');
    Route::get('/gallery-albums/image/delete', [GalleryAlbumController::class, 'destroyGalleryImage'])->name('gallery-albums.gallery-image.destroy');
    Route::put('/gallery-albums/{id}/status', [GalleryAlbumController::class, 'statusToggle'])->name('gallery-albums.status');

    // Gallery Media
    Route::prefix('gallery-media')->name('gallery-media.')->group(function () {
        Route::get('/', [GalleryMediaController::class, 'index'])->name('index');
        Route::get('/data', [GalleryMediaController::class, 'getGalleryData'])->name('data');
        Route::post('/store', [GalleryMediaController::class, 'store'])->name('store');
        Route::get('/detail/{id}', [GalleryMediaController::class, 'getDetail'])->name('detail');
        Route::get('/edit/{id}', [GalleryMediaController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [GalleryMediaController::class, 'update'])->name('update');
        Route::post('/toggle-status/{id}', [GalleryMediaController::class, 'statusToggle'])->name('toggleStatus');
        Route::post('/upload/{id?}', [GalleryMediaController::class, 'upload'])->name('upload');
        Route::get('/image/delete', [GalleryMediaController::class, 'destroyImage'])->name('image.destroy');
        Route::delete('/delete/{id}', [GalleryMediaController::class, 'destroy'])->name('delete');
    });

    // Client
    Route::resource('client', ClientController::class);
    Route::get('/client/status/{id}', [ClientController::class, 'toggleStatus'])->name('client.status');
    Route::resource('page-banner', PageBannerController::class);
    Route::put('/page-banner/{id}/status', [PageBannerController::class, 'statusToggle'])->name('page-banner.status');
    // Admin Logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');





    // Contact messages
    // Contact messages
    Route::prefix('contact')->name('contact.')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('index');
        Route::get('/get-data', [ContactController::class, 'getContact'])->name('get-data');
        Route::get('/detail/{id}', [ContactController::class, 'showDetail'])->name('detail');
        Route::get('/delete/{id}', [ContactController::class, 'destroy'])->name('delete');
    });
    Route::resource('/newsletters', AdminSideNewsLetterController::class);


    // Settings
    Route::prefix('setting')->name('setting.')->group(function () {
        Route::get('/', [SettingController::class, 'index'])->name('index');
        Route::post('/', [SettingController::class, 'store'])->name('store');
    });

    Route::apiResource('jobs', JobController::class);
    Route::resource('vacancies', VacancyController::class);
    Route::get('/jobs/status/{id}', [JobController::class, 'toggleStatus'])->name('client.status');
    Route::apiResource('job-categories', JobCategoryController::class);
    Route::get('/job-categories/status/{id}', [JobCategoryController::class, 'toggleStatus'])->name('client.status');



    // Logout route for normal users
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});


Route::post('/newsletter/subscribe', [NewsLetterController::class, 'subscribe'])->name('newsletter.subscribe');


// frontend routes includes

require base_path('routes/frontend_routes.php');
