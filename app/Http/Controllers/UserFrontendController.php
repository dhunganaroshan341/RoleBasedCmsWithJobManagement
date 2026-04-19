<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactFormMail;
use App\Models\BannerSliderVideo;
use App\Models\CallToAction;
use App\Models\Category;
use App\Models\Destination;
use App\Models\HireWorker;
use App\Models\TourPackage;
use App\SampleData\HomeSampleData;
use Illuminate\Http\Request;
use App\Models\frontend;
use App\Models\User;
use App\Models\Comment;
use App\Models\Contact;
use App\Models\Country;
use App\Models\Post;
use App\Models\HomeSlide;
use App\Models\Notice;
use App\Models\PageBanner;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Testimonial;
use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserFrontendController extends Controller
{

    public function home()
    {
        $frontend = Setting::first();
        $homeslides = HomeSlide::where('status', 'Active')->get();
        $testimonials = Testimonial::where('status', 'Active')->get();
        $destinations = TourPackage::where('status', 'Active')->get();
        $topDestinations = TourPackage::with('images', 'country')->where('status', 'Active')->where('top_deal', 1)->get();
        // $topDeals =$topDestinations;
        // $favDestinations = TourPackage::where('status', 'Active')->where('favourite_destination',1)->get();

        $clients = \App\Models\Client::with('albums')->get();
        $services = Service::where('status', 1)->get();
        $content_title = "Home";
        $cta = CallToAction::where('page', 'home')->first();
        $posts = Post::with('categories', 'postImages')->latest()->take(6)->get();

        $video = BannerSliderVideo::latest()->first();



        return view('frontend.home', compact([

            'destinations',
            'video',
            'posts',
            'cta',
            'services',
            'frontend',
            'homeslides',
            'testimonials',
            'content_title',
            'clients',

        ]));
    }

    public function aboutUs()
    {

        // Fetch rest of members excluding top members, paginated
        $members = User::whereNotIn('id', [1, 2])->paginate(6);

        $pageBanner = PageBanner::where('page', 'about')->first();
        $frontend = Setting::first();
        $cta = CallToAction::where('page', 'about')->first();
        $pageDescription = Setting::first()->work_description;
        $pageDescriptionImage  = Setting::first()->about_image;
        $content_title = "About Us";

        return view('frontend.about', compact(
            'pageDescription',
            'pageDescriptionImage',
            'cta',
            'members',
            'frontend',
            'content_title',
            'pageBanner'
        ));
    }


    public function service()
    {
        $services = Service::where('status', 1)->get();
        $content_title = "Services";
        $pageBanner = PageBanner::where('page', 'services')->first();

        return view('frontend.services', compact('services', 'content_title', 'pageBanner'));
    }

    public function servicedetail($id)
    {
        $serviceDetail = Service::find($id);
        $otherServices = Service::where('status', 1)->where('id', '!=', $id)->get();
        $posts = Post::with('categories', 'postImages')
            ->latest()
            ->get();
        $content_title = "Service Detail";

        if (!$serviceDetail || !$posts) {
            abort('404');
        }
        $pageBanner = PageBanner::where('page', 'services')->first();

        return view('frontend.service-detail', compact('serviceDetail', 'posts', 'content_title', 'pageBanner', 'otherServices'));
    }












    public function contactUs()
    {
        $content_title = "Home";
        $pageBanner = PageBanner::where('page', 'contact')->first();

        return view('frontend.contact', compact('content_title', 'pageBanner'));
    }

    public function storeContactUs(ContactRequest $request)
    {
        try {
            // Save to DB
            $contact = Contact::create($request->validated());

            // Optional: Send email
            // Mail::to('dhunganaroshan341@gmail.com')->send(new ContactFormMail($contact->toArray()));

            return redirect()
                ->back()
                ->with('success', 'Message has been submitted successfully');
        } catch (\Exception $e) {
            Log::error('Contact form error: ' . $e->getMessage());

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong');
        }
    }
}
