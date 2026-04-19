<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function about()
    {
        return view('frontend.home/about');
    }
    public function contact()
    {
        return view('frontend.home/contact');
    }
    public function index()
    {
        $posts = Post::with('categories')->where('status', 'Active')->latest()->take(3)->get();
        $testimonials = Testimonial::where('status', 'Active')->get();

        // dd($testimonials->toArray());

        return view('frontend.home/index', compact('posts', 'testimonials'));
    }
}
