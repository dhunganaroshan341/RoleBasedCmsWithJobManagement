@extends('frontend.layouts.layout')

@php
$subscribeStyleTwo = true;
$subTitle = 'Organizational Chart';
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

            {{-- ================= PAGE CONTENT ================= --}}
            @if(!empty($page))
            <div class="sec-title">
                <span class="sub-title mb_10">{{ $page->title ?? '' }}</span>
                <p class="mt_20">{!! $page->content ?? '' !!}</p>
            </div>

            {{-- ================= MEDIA ITEMS ================= --}}
            @elseif(!empty($mediaItems))
            <div class="sec-title">
                <span class="sub-title mb_10">Our Organization</span>
                <h2>Organizational Chart</h2>
            </div>

            <div class="row g-4 mt-4">
                @forelse($mediaItems as $item)
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset($item->media_path) }}" alt="Organizational Chart" class="img-fluid rounded">
                    </div>
                </div>
                @empty
                <p>Not available at the moment.</p>
                @endforelse
            </div>

            {{-- ================= STATIC IMAGE ================= --}}
            @elseif(!empty($static))
            <div class="sec-title">
                <span class="sub-title mb_10">Our Organization</span>
                <h2>Organizational Chart</h2>
            </div>

            <div class="row g-4 mt-4">
                <div class="col-md-12">
                    <div class="card border-0 shadow-sm">
                        <img src="{{ asset('defaultImage/organizational-chart.jpg') }}" alt="Organizational Chart"
                            class="img-fluid rounded">
                    </div>
                </div>
            </div>

            @endif

        </div>
    </div>
</div>
</section>
@endsection