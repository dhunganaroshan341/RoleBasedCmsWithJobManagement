<!-- main header -->
<header class="main-header header-style-two">
    @php
    $currentRoute = Route::currentRouteName();
    @endphp

    <!-- header-top -->
    <div class="header-top">
        <div class="outer-container">
            <div class="top-inner">
                <ul class="info">
                    <li>
                        <img src="{{ asset('assets/images/icons/icon-6.png') }}" alt="">
                        <a href="tel:+977015261063">+977-01-5261063 | 5260810</a>
                    </li>
                    <li>
                        <img src="{{ asset('assets/images/icons/icon-7.png') }}" alt="">

                        <a href="mailto:aurorashrpl@gmail.com">aurorashrpl@gmail.com</a> |
                        <a href="mailto:info@auroranepal.com.np">info@auroranepal.com.np</a>
                    </li>
                </ul>
                <p><span>Latest News:</span> {{ $latestNewsTitle??'Not available at the moment' }}</p>
                <div class="right-column">
                    <ul class="social-links">
                        <li><span>Share:</span></li>
                        <li><a href="{{ route('index') }}"><i class="icon-22"></i></a></li>
                        <li><a href="{{ route('index') }}"><i class="icon-23"></i></a></li>
                        <li><a href="{{ route('index') }}"><i class="icon-24"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- header-lower -->
    <div class="header-lower">
        <div class="outer-container">
            <div class="outer-box">
                <figure class="logo-box">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logo-bg.png') }}" alt="Aurora Human Resource">
                    </a>
                </figure>
                <div class="menu-area">
                    <!-- Mobile Navigation Toggler -->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>

                    <nav class="main-menu navbar-expand-md navbar-light clearfix">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                {{-- <li class="{{ $currentRoute === 'index' ? 'homeCurrent' : '' }}"><a
                                        href="{{ route('index') }}">Home</a></li> --}}

                                <li
                                    class="dropdown {{ in_array($currentRoute, ['about', 'company-overview', 'message-from-chairman', 'license-certificates', 'organizational-chart']) ? 'current' : '' }}">
                                    <a href="#">About</a>
                                    <ul class="submenu">
                                        <li class="{{ $currentRoute === 'company-overview' ? 'current' : '' }}"><a
                                                href="{{ route('company-overview') }}">Company Overview</a></li>
                                        <li class="{{ $currentRoute === 'message-from-chairman' ? 'current' : '' }}"><a
                                                href="{{ route('message-from-chairman') }}">Message from Chairman</a>
                                        </li>
                                        <li class="{{ $currentRoute === 'license-certificates' ? 'current' : '' }}"><a
                                                href="{{ route('license-certificates') }}">License & Certificates</a>
                                        </li>
                                        <li class="{{ $currentRoute === 'organizational-chart' ? 'current' : '' }}"><a
                                                href="{{ route('organizational-chart') }}">Organizational Chart</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="{{ $currentRoute === 'dynamic-categories' ? 'current' : '' }}"><a
                                        href="{{ route('dynamic-categories') }}">Category</a></li>
                                <li class="{{ $currentRoute === 'hire' ? 'current' : '' }}"><a
                                        href="{{ route('hire') }}">Hire Workers</a></li>
                                <li class="{{ $currentRoute === 'jobs' ? 'current' : '' }}"><a
                                        href="{{ route('jobs') }}">Vacancies</a></li>

                                <li
                                    class="dropdown {{ in_array($currentRoute, ['required-documents', 'recruitment-process']) ? 'current' : '' }}">
                                    <a href="{{ route('index') }}">Procedures</a>
                                    <ul class="submenu">
                                        <li class="{{ $currentRoute === 'required-documents' ? 'current' : '' }}"><a
                                                href="{{ route('required-documents') }}">Required Documents</a></li>
                                        <li class="{{ $currentRoute === 'recruitment-process' ? 'current' : '' }}"><a
                                                href="{{ route('recruitment-process') }}">Recruitment Process</a></li>
                                    </ul>
                                </li>

                                <li class="{{ $currentRoute === 'blog' ? 'current' : '' }}"><a
                                        href="{{ route('blog') }}">Blog</a></li>
                            </ul>
                        </div>
                    </nav>
                </div>

                <div class="menu-right-content">

                    <!-- Always visible -->
                    <div class="link-box mr_20">
                        <a href="{{ route('jobseeker.create') }}">Upload CV</a>
                    </div>

                    @guest
                    <!-- Only when NOT logged in -->
                    <div class="link-box mr_20">
                        <a href="{{ route('front.login') }}">Login</a>
                    </div>
                    @endguest

                    <!-- Always visible -->
                    <div class="btn-box">
                        <a href="{{ route('contact') }}" class="theme-btn btn-one">Contact Us</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- sticky Header -->
    <div class="sticky-header">
        <div class="outer-container">
            <div class="outer-box">
                <figure class="logo-box">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('assets/images/logo-bg.png') }}" alt="Aurora Human Resource">
                    </a>
                </figure>
                <div class="menu-area">
                    <nav class="main-menu clearfix">
                        <!-- Aurora Menu loaded via JS -->
                    </nav>
                </div>
                <div class="menu-right-content">
                    @auth
                    <div class="link-box mr_20">
                        Hello, {{ auth()->user()->full_name }}
                    </div>
                    @else
                    <div class="link-box mr_20">
                        <a href="{{ route('jobseeker.create') }}">Upload CV</a>
                    </div>
                    @endauth

                    <div class="btn-box"><a href="{{ route('contact') }}" class="theme-btn btn-one">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->