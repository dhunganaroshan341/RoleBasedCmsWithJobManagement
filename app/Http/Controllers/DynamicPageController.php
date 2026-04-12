<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class DynamicPageController extends Controller
{
    //
    public function companyOverview()
    {
        // $content = Page::where('slug', 'company-overview')->firstOrFail();
        $content = "hello";
        return view('frontend.home.company-overview', compact('content'));
    }
    public function categories()
    {
        $content = Page::where('slug', 'categories')->firstOrFail();
        return view('frontend.dynamic-page', compact('content'));
    }

    public function messageFromChairman()
    {
        $content = Page::where('slug', 'message-from-chairman')->firstOrFail();
        return view('frontend.message-from-chairman', compact('content'));
    }

    public function licenseCertificates()
    {
        $album = \App\Models\GalleryAlbum::where('title', 'License and Certificates')->firstOrFail();

        $mediaItems = $album->galleryMedia;
        // dd($mediaItems);
        return view('frontend.home.lisence-certificates', compact('album', 'mediaItems'));
    }

    public function organizationalChart()
    {
        $album = \App\Models\GalleryAlbum::where('title', 'Organizational Chart')->first();

        $mediaItems = optional($album)->galleryMedia ?? collect();

        // If no media items → use static
        if ($mediaItems->isEmpty()) {
            $static = true;

            return view('frontend.home.organizational-chart', compact('static'));
        }

        return view('frontend.home.organizational-chart', compact('album', 'mediaItems'));
    }

    public function requiredDocuments()
    {
        // $content = Page::where('slug', 'required-documents')->firstOrFail();
        $content = "hello";
        return view('frontend.pages.required-documents', compact('content'));
    }

    public function recruitmentProcess()
    {
        // $content = Page::where('slug', 'recruitment-process')->firstOrFail();
        $content = "hello";

        return view('frontend.pages.recruitment-procedure', compact('content'));
    }

    public function ourClients()
    {
        $content = Page::where('slug', 'our-clients')->firstOrFail();
        return view('frontend.dynamic-page', compact('content'));
    }

    public function vacancies()
    {
        $content = Page::where('slug', 'vacancies')->firstOrFail();
        return view('frontend.dynamic-page', compact('content'));
    }
}
