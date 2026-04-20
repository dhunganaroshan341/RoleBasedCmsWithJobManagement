<!-- page wrapper -->

@extends('frontend.layouts.layout')
@php
$subscribeStyleTwo = true;
$css =
'
<link href="' .
        asset('assets/css/module-css/banner.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/clients.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/about.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/chooseus.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/industries.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/process.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/faq.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/training.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/pricing.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/download.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/testimonial.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/news.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/subscribe.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/footer.css') .
        '" rel="stylesheet">';

$title = 'Home';
$subTitle = '';
@endphp
@push('styles')
<style>
    :root {
        /* Aurora Red */
        --aurora-red: #f00c0d;
        --aurora-red-light: #ff4d4f;
        --aurora-red-dark: #a9000b;

        /* Aurora Blue */
        --aurora-blue: #3ea6e5;
        --aurora-blue-light: #6fc3f0;
        --aurora-blue-dark: #2178b4;

        /* Aurora Orange */
        --aurora-orange: #f4b46b;
        --aurora-orange-light: #f8cc96;
        --aurora-orange-dark: #d9953e;
    }

    /* === Background Color Classes === */
    .bg-aurora-red {
        background-color: var(--aurora-red);
    }

    .bg-aurora-red-light {
        background-color: var(--aurora-red-light);
    }

    .bg-aurora-red-dark {
        background-color: var(--aurora-red-dark);
    }

    .bg-aurora-blue {
        background-color: var(--aurora-blue);
    }

    .bg-aurora-blue-light {
        background-color: var(--aurora-blue-light);
    }

    .bg-aurora-blue-dark {
        background-color: var(--aurora-blue-dark);
    }

    .bg-aurora-orange {
        background-color: var(--aurora-orange);
    }

    .bg-aurora-orange-light {
        background-color: var(--aurora-orange-light);
    }

    .bg-aurora-orange-dark {
        background-color: var(--aurora-orange-dark);
    }

    /* === Text Color Classes === */
    .text-aurora-red {
        color: var(--aurora-red);
    }

    .text-aurora-red-light {
        color: var(--aurora-red-light);
    }

    .text-aurora-red-dark {
        color: var(--aurora-red-dark);
    }

    .text-aurora-blue {
        color: var(--aurora-blue);
    }

    .text-aurora-blue-light {
        color: var(--aurora-blue-light);
    }

    .text-aurora-blue-dark {
        color: var(--aurora-blue-dark);
    }

    .text-aurora-orange {
        color: var(--aurora-orange);
    }

    .text-aurora-orange-light {
        color: var(--aurora-orange-light);
    }

    .text-aurora-orange-dark {
        color: var(--aurora-orange-dark);
    }

    /* === Border Color Classes === */
    .border-aurora-red {
        border-color: var(--aurora-red);
    }

    .border-aurora-red-light {
        border-color: var(--aurora-red-light);
    }

    .border-aurora-red-dark {
        border-color: var(--aurora-red-dark);
    }

    .border-aurora-blue {
        border-color: var(--aurora-blue);
    }

    .border-aurora-blue-light {
        border-color: var(--aurora-blue-light);
    }

    .border-aurora-blue-dark {
        border-color: var(--aurora-blue-dark);
    }

    .border-aurora-orange {
        border-color: var(--aurora-orange);
    }

    .border-aurora-orange-light {
        border-color: var(--aurora-orange-light);
    }

    .border-aurora-orange-dark {
        border-color: var(--aurora-orange-dark);
    }

    .homeCurrent a {
        color: var(--aurora-red-dark) !important;
    }
</style>




<style>
    h4 {
        color: var(--aurora-blue-dark) !important;
    }

    span {
        color: var(--aurora-red-dark) !important;
        border-color: var(--aurora-red) !important;
    }

    .content-box span {
        color: var(--theme-color-2) !important;
    }

    .dueal-section span {
        color: var(--aurora-red) !important;
    }

    .industries-style-two span {
        /* color: var(--aurora-blue-light) !important; */
        color: var(--theme-color-2) !important;
    }

    .testimonial-section span {
        /* color: var(--aurora-blue-light) !important; */
        color: var(--theme-color-2) !important;
    }

    .sub-title {
        /* color: var(--aurora-blue-light) !important; */
        color: var(--theme-color-2) !important;
    }

    .subscribe-style-two span {
        color: var(--aurora-blue) !important;
    }

    .menu-right-content .theme-btn {
        /* background: var(--aurora-blue) !important; */
    }

    .banner-section .btn-box span {
        color: white !important;
    }

    .sec-title span {
        /* color: var(--aurora-blue-light) !important; */
        color: var(--theme-color-2) !important;
    }

    .copyright a {
        color: var(--aurora-red-dark) !important;

    }

    .category {
        /* color: var(--aurora-red-dark) !important; */
        color: white !important;
        background: var(--theme-color-2) !important;
    }
</style>
@endpush

@section('content')
<!-- banner-section -->
<section class="banner-section banner-style-two p_relative">
    <div class="shape" style="background-image: url('{{ asset('assets/images/shape/shape-5.png') }}')">
    </div>
    <div class="pattern-layer-2" style="background-image: url('{{ asset('assets/images/shape/shape-4.png') }}')"></div>
    <div class="bg-layer" style="background-image: url('{{ asset('assets/images/banner/banner-1.jpg') }}')">
    </div>
    <div class="outer-container">
        <div class="content-box">
            <h2>Empowering Global Careers with <span>Aurora HR</span></h2>
            <p>Connecting Nepalese talent with trusted international opportunities while helping employers
                find the right workforce across Asia, Europe, and the Gulf.</p>
            <div class="btn-box">

                @auth
                @cannot('has-profile')
                <a href="{{ route('jobseeker.create') }}" class="theme-btn btn-one mr_20">
                    <span>Upload CV</span>
                </a>
                @else
                <form method="POST" action="{{ route('user.logout') }}">
                    @csrf
                    <button style="background-color: #a9000b;" type="submit" class="theme-btn banner-btn mr_20">
                        <span class="text-danger">Logout</span>
                    </button>
                </form>
                @endcannot
                @endauth

                @guest
                <a href="{{ route('jobseeker.create') }}" class="theme-btn btn-one mr_20">
                    <span>Upload CV</span>
                </a>
                @endguest

                <a href="{{ route('jobs') }}" class="theme-btn banner-btn">Job Openings</a>

            </div>
        </div>
    </div>
</section>
<!-- banner-section end -->


<!-- clients-style-two -->
@isset($latestVacancies)
<section class="clients-style-two centred pt_110 pb_120">
    <div class="auto-container">
        <div class="title-text">
            <h3>Latest Vacancies</h3>
        </div>

        <div class="clients-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">

            @foreach($latestVacancies as $vacancy)
            <div class="sec-title pb_20 sec-title-animation animation-style2">
                <span style="padding:1.6em !important" class="sub-title mb_10 title- text-aurora-red">{{
                    $vacancy->custom_company_country }}- {{
                    $vacancy->jobs_count }}</span>

            </div>

            @endforeach

        </div>
    </div>
</section>
@endisset
<!-- clients-style-two end -->

<!-- about-style-two -->
<section class="about-style-two">
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_one">
                    <div class="content-box mr_80">
                        <div class="sec-title pb_20 sec-title-animation animation-style2">
                            <span class="sub-title mb_10 title- text-aurora-red">About us</span>
                            <h2 class="title-animation"><span>Aurora</span> Human Resource Pvt.ltd</h2>
                        </div>
                        <div class="text-box">
                            <p>Aurora Human Resource (P) Ltd., an international manpower agency, is one of the
                                pioneers in manpower recruiting. Established with the core belief of providing
                                true customer-focused solutions in the field of Human Resource recruiting,
                                Aurora
                                is backed by a team of highly dedicated and experienced professionals,
                                ultra-modern resources, and a centrally located workplace at Kupondole,
                                Lalitpur.
                                Over the years, we have successfully established ourselves as a trusted brand in
                                Nepal’s manpower market.</p>
                            <p>We have proudly deployed more than <strong>10,000 unskilled, semi-skilled, and
                                    skilled
                                    personnel</strong> to Asian, European, and Gulf countries. Our primary
                                objective is
                                to enable Nepalese citizens to earn a decent living abroad while contributing to
                                the country’s economy through remittances, ultimately helping to reduce
                                unemployment.</p>
                            <ul class="list-style-one clearfix">
                                <li>Successfully deployed 10,000+ professionals worldwide</li>
                                <li>Dedicated to reducing unemployment in Nepal</li>
                                <li>Supplying all categories of human resources in the shortest time</li>
                                <li>Strong presence in Asian, European, and Gulf markets</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            @php
            $video = $homeSectionOneVideos?->video_urls[0] ?? null;
            @endphp
            <div class="col-lg-6 col-md-12 col-sm-12 video-column">
                <div class="video_block_two">
                    <div class="video-box t_120 z_1 p_relative ml_40 mr_60 centred">

                        <div class="video-inner"
                            style="background-image: url('{{'uploads/'. $video['thumbnail'] ?? asset('assets/images/resource/video-4.jpg') }}')">

                            <div class="video-content">

                                <div class="curve-text">
                                    <span class="curved-circle">
                                        watch&nbsp;&nbsp;the&nbsp;&nbsp;video&nbsp;&nbsp;right&nbsp;&nbsp;now&nbsp;&nbsp;
                                    </span>
                                </div>

                                @if(!empty($video['url']))
                                <a href="{{ $video['url'] }}" class="lightbox-image video-btn" data-caption="">
                                    <i class="icon-8"></i>
                                </a>
                                @else
                                <a href="https://www.youtube.com/watch?v=nfP5N9Yc72A&t=28s"
                                    class="lightbox-image video-btn" data-caption="">
                                    <i class="icon-8"></i>
                                </a>
                                @endif

                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- about-style-two end -->

<!-- chooseus-section -->
<section class="chooseus-section alternat-2 pt_120 pb_90">
    <div class="auto-container">
        <div class="sec-title pb_60 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">Why Us</span>
            <h2 class="title-animation">Why Choose Us</h2>
        </div>
        <div class="inner-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-4"></i></div>
                            <h3><a href="{{ route('index') }}">Reliable Hiring Process</a></h3>
                            <p>With years of expertise in international recruitment, we have successfully deployed over
                                10,000 skilled and unskilled professionals across Asia, Europe, and the Gulf, making us
                                a trusted name in manpower solutions.</p>
                            <div class="link"><a href="{{ route('index') }}">Learn More<i class="icon-7"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-5"></i></div>
                            <h3><a href="{{ route('index') }}">Quality-Driven Candidate Selection</a></h3>
                            <p>Our dedicated team carefully screens and shortlists candidates to match job requirements,
                                ensuring employers receive competent, reliable, and well-trained manpower.</p>
                            <div class="link"><a href="{{ route('index') }}">Learn More<i class="icon-7"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12 chooseus-block">
                    <div class="chooseus-block-one">
                        <div class="inner-box">
                            <div class="icon-box"><i class="icon-6"></i></div>
                            <h3><a href="{{ route('index') }}">Global Network & Compliance</a></h3>
                            <p>Operating with international standards and government-approved processes, we maintain
                                strong partnerships across multiple countries while ensuring full compliance with labor
                                laws and ethical recruitment practices. </p>
                            <div class="link"><a href="{{ route('index') }}">Learn More<i class="icon-7"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- chooseus-section end -->



<!-- dueal-section -->
<section class="dueal-section pt_120 pb_120">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_two">
                    <div class="content-box mr_100">
                        <div class="sec-title pb_35 sec-title-animation animation-style2">
                            <span class="sub-title mb_10 title-animation">The Process</span>
                            <h2 class="title-animation">How It Works</h2>
                        </div>
                        <div class="inner-box">

                            <!-- Malaysia Requirements -->
                            <div class="single-item">
                                <span class="count-text">1</span>
                                <h3><a href="{{ route('index') }}">For Malaysia</a></h3>
                                <p>The following documents are required from foreign employers to process
                                    recruitment through Aurora HR PVT. LTD.:</p>
                                <ul>
                                    <li>KDN Approval (From Labor Ministry)</li>
                                    <li>Translation Letter (From Labor or Home Ministry)</li>
                                    <li>Demand Letter</li>
                                    <li>Power of Attorney</li>
                                    <li>Agency Agreement</li>
                                    <li>Employment Contract</li>
                                    <li>Notary Public</li>
                                    <li>Letter from Nepal Embassy to Labor Department Nepal</li>
                                    <li>ID copy of authorized employer company representative</li>
                                    <li>His Excellency Letter (from employer company to Malaysian consulate in
                                        Nepal)</li>
                                </ul>
                            </div>

                            <!-- GCC & Japan Requirements -->
                            <div class="single-item">
                                <span class="count-text">2</span>
                                <h3><a href="{{ route('index') }}">For Japan, Qatar, Kuwait, Bahrain, Oman &
                                        UAE</a></h3>
                                <p>The following documents are required to recruit human resources from Nepal:
                                </p>
                                <ul>
                                    <li>Demand Letter</li>
                                    <li>Power of Attorney</li>
                                    <li>Agency Agreement</li>
                                    <li>Employment Contract</li>
                                    <li>Guarantee Letter</li>
                                </ul>
                            </div>

                            <!-- Note Section -->
                            <div class="single-item">
                                <span class="count-text">3</span>
                                <h3><a href="{{ route('index') }}">Important Note</a></h3>
                                <p>All documents must be attested by the Nepalese Consulate & Notary Public or
                                    Chambers of Commerce
                                    of the host country before submission to Aurora HR PVT. LTD. for government
                                    formalities.</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                <div class="content_block_three">
                    <div class="content-box">
                        <div class="sec-title pb_30 sec-title-animation animation-style2">
                            <span class="sub-title mb_10 title-animation">Recruitment</span>
                            <h2 class="title-animation">Recruitment Procedure</h2>
                        </div>
                        <ul class="accordion-box">

                            <li class="accordion block active-block">
                                <div class="acc-btn active">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Pre-Labor Approval</h4>
                                </div>
                                <div class="acc-content current">
                                    <div class="content">
                                        <p>After receiving the Demand Letter from the respective company, the
                                            documents are
                                            presented to the Department of Labor in Nepal for approval. Once
                                            approved, the
                                            recruitment process can move forward.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Advertisement</h4>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <p>The approved demand letter is published in national newspapers and
                                            announced via
                                            internet, SMS, and phone calls. Candidates may apply directly or
                                            through sub-agents
                                            and marketing executives.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Candidate Screening / Interview</h4>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <p>Aurora HR shortlists candidates based on merit and employer criteria.
                                            Final interviews
                                            are conducted by the employer, ensuring the most suitable candidates
                                            are selected.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Communications</h4>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <p>Our computerized and networked system ensures efficient communication
                                            between
                                            candidates, clients, and our team to provide prompt and quality
                                            manpower services.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Medical Checkup</h4>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <p>Selected candidates undergo full medical examinations at authorized
                                            centers. Only
                                            medically fit candidates proceed to sign employment contracts and
                                            visa procedures.</p>
                                    </div>
                                </div>
                            </li>

                            <li class="accordion block">
                                <div class="acc-btn">
                                    <div class="icon-box"><i class="icon-21"></i></div>
                                    <h4>Visa Processing</h4>
                                </div>
                                <div class="acc-content">
                                    <div class="content">
                                        <p>All required documents, including passport copies, medical reports,
                                            photos, and
                                            experience certificates, are submitted for visa processing through
                                            the employer.</p>
                                    </div>
                                </div>
                            </li>
                            {{-- some changess --}}
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- dueal-section end -->

<!-- training-section -->
<!-- services-style -->
<x-training-section :videos="$homeSectionTwoVideos" />
<!-- services-style end -->


<!-- testimonial-section -->
<section class="testimonial-section pt_120 pb_90">
    <div class="pattern-layer" style="background-image: url('{{ asset('assets/images/shape/shape-3.png') }}')"></div>

    <div class="auto-container">
        <div class="sec-title light centred pb_60 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">Testimonials</span>
            <h2 class="title-animation">Words From Clients</h2>
        </div>

        @if(!empty($testimonials) && $testimonials->count() > 0)

        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">

            @foreach ($testimonials as $testimonial)

            @php
            $fallbackImages = [
            'assets/images/resource/testimonial-1.png',
            'assets/images/resource/testimonial-2.png',
            'assets/images/resource/testimonial-3.png',
            'user.png',
            ];

            $image = !empty($testimonial->image)
            ? asset($testimonial->image)
            : asset($fallbackImages[array_rand($fallbackImages)]);
            @endphp

            <div class="testimonial-block-one">
                <div class="inner-box">

                    <div class="shape" style="background-image: url('{{ asset('assets/images/shape/shape-7.png') }}')">
                    </div>

                    <div class="icon-box">
                        <img src="{{ asset('assets/images/icons/icon-10.png') }}" alt="">
                    </div>

                    <div class="author-box">
                        <figure class="thumb-box">
                            <img src="{{ $image }}" alt="{{ $testimonial->name ?? 'User' }}">
                        </figure>

                        <h4>{{ $testimonial->name ?? 'Anonymous' }}</h4>
                        <span class="designation">{{ $testimonial->designation ?? 'Client' }}</span>
                    </div>

                    <p>{{ $testimonial->description ?? 'No testimonial provided.' }}</p>

                </div>
            </div>

            @endforeach

        </div>

        @else

        {{-- 🔥 fallback UI when no testimonials exist --}}
        <div class="three-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">

            @for ($i = 0; $i < 3; $i++) @php $fallbackImages=[ 'assets/images/resource/testimonial-1.png'
                , 'assets/images/resource/testimonial-2.png' , 'assets/images/resource/testimonial-3.png' , ]; @endphp
                <div class="testimonial-block-one">
                <div class="inner-box">

                    <div class="shape" style="background-image: url('{{ asset('assets/images/shape/shape-7.png') }}')">
                    </div>

                    <div class="icon-box">
                        <img src="{{ asset('assets/images/icons/icon-10.png') }}" alt="">
                    </div>

                    <div class="author-box">
                        <figure class="thumb-box">
                            <img src="{{ asset($fallbackImages[$i]) }}" alt="User">
                        </figure>

                        <h4>Sample User</h4>
                        <span class="designation">Client</span>
                    </div>

                    <p>Testimonial content will appear here once users submit feedback.</p>

                </div>
        </div>

        @endfor

    </div>

    @endif

    </div>
</section>
<!-- testimonial-section end -->

<!-- news-section -->
<section class="news-section pt_120 pb_90">
    <div class="auto-container">
        <div class="sec-title centred pb_60 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">Media</span>
            <h2 class="title-animation">Latest News</h2>
        </div>

        <div class="row clearfix">

            @if($posts->count() > 0)

            @foreach($posts as $post)
            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-two wow fadeInUp animated">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="{{ route('blogDetail', $post->slug) }}">
                                    <img src="{{ asset('assets/images/news/news-4.jpeg') }}" alt="">
                                </a>
                            </figure>
                            <figure class="overlay-image">
                                <a href="{{ route('blogDetail', $post->slug) }}">
                                    <img src="{{ asset('assets/images/news/news-4.jpeg') }}" alt="">
                                </a>
                            </figure>
                        </div>

                        <div class="lower-content">
                            <span class="category">Business</span>

                            <h3>
                                <a href="{{ route('blogDetail', $post->slug) }}">
                                    {{ Str::limit($post->title, 60) }}
                                </a>
                            </h3>

                            <ul class="post-info">
                                <li>
                                    By
                                    <a href="#">
                                        {{ optional($post->creator)->name ?? 'Admin' }}
                                    </a>
                                </li>
                                <li>
                                    <span>{{ $post->created_at->format('F d, Y') }}</span>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

            @else

            {{-- 🔥 FALLBACK (your original static code) --}}

            <div class="col-lg-4 col-md-6 col-sm-12 news-block">
                <div class="news-block-two">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href="#"><img src="{{ asset('assets/images/news/news-4.jpeg') }}"></a>
                            </figure>
                        </div>
                        <div class="lower-content">
                            <span class="category">Business</span>
                            <h3><a href="#">Create a series of blog posts discussing common interview</a></h3>
                            <ul class="post-info">
                                <li>By <a href="#">Admin</a></li>
                                <li><span>March 20, 2023</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- repeat your other 2 static blocks here --}}

            @endif

        </div>
    </div>
</section>
<!-- news-section end -->
@endsection