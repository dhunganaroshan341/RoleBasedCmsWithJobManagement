@extends('frontend.layouts.layout')

@php
$subscribeStyleTwo = true;
$subTitle = 'lisence & certificates';
$title = 'About Us';

$css = '
<link href="' . asset(" assets/css/module-css/page-title.css") . '" rel="stylesheet">
        <link href="' . asset("assets/css/module-css/service-details.css") . '" rel="stylesheet">
        <link href="' . asset("assets/css/module-css/subscribe.css") . '" rel="stylesheet">
        <link href="' . asset("assets/css/module-css/footer.css") . '" rel="stylesheet">' ; @endphp @section('content')
    <section class="service-details pt_110 pb_120">
<div class="auto-container">
    <div class="row align-items-start">
        <!-- Sidebar -->
        <div class="col-lg-4 col-md-12 col-sm-12 sidebar-side mb-5 mb-lg-0">
            <div class="service-sidebar mr_40">
                <div class="category-widget mb_40">
                    <ul class="category-list clearfix">
                        <li>
                            <a href="{{ route('company-overview') }}"
                                class="{{ request()->routeIs('company-overview') ? 'current' : '' }}">
                                Company Overview <i class="icon-42"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('message-from-chairman') }}"
                                class="{{ request()->routeIs('message-from-chairman') ? 'current' : '' }}">
                                Message from Chairman <i class="icon-42"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('license-certificates') }}"
                                class="{{ request()->routeIs('license-certificates') ? 'current' : '' }}">
                                License & Certificates <i class="icon-42"></i>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('organizational-chart') }}"
                                class="{{ request()->routeIs('organizational-chart') ? 'current' : '' }}">
                                Organizational Chart <i class="icon-42"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Right Content -->
        <div class="col-lg-8 col-md-12 col-sm-12">
            @if(isset($page))
            <div class="sec-title">
                <span class="sub-title mb_10">{{ $page->title ?? '' }}</span>
                <h2>{{ $page->sub_title ?? '' }}</h2>
                <p class="mt_20">{!! $page->content ?? '' !!}</p>
            </div>
            @elseif(isset($mediaItems))
            <div class="sec-title">
                <span class="sub-title mb_10">License & Certificates</span>
                <h2>Our Certifications</h2>
            </div>
            <div class="row g-4 mt-4">
                @forelse($mediaItems as $item)
                <div class="col-md-6 col-lg-4">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset($item->media_path) }}" alt="Certificate" class="img-fluid rounded">
                    </div>
                </div>
                @empty
                <p>No certificates available at the moment.</p>
                @endforelse
            </div>
            @endif
        </div>
    </div>
</div>
</section>
@endsection