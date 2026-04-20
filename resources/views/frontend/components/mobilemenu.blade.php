<div class="mobile-menu">
    <div class="menu-backdrop"></div>

    <!-- Close Button -->
    <div class="close-btn text-end p-3">
        <i class="fas fa-times fs-4"></i>
    </div>

    <nav class="menu-box p-3">

        <!-- Logo -->
        <div class="nav-logo text-center mb-4">
            <a href="{{ route('index') }}">
                <img src="{{ asset('assets/images/logo-2.png') }}" alt="Logo" class="img-fluid"
                    style="max-height: 50px;">
            </a>
        </div>

        <!-- Menu -->
        <div class="menu-outer mb-4">
            <!-- JS injected menu -->
            <!-- Action Buttons -->
            <div class="mobile-actions mb-4">

                <!-- Always visible -->
                <div class="mb-2">
                    <a href="{{ route('jobseeker.create') }}" class="btn btn-outline-light w-100">
                        Upload CV
                    </a>
                </div>

                @guest
                <!-- Only when NOT logged in -->
                <div class="mb-2">
                    <a href="{{ route('front.login') }}" class="btn btn-outline-light w-100">
                        Login
                    </a>
                </div>
                @endguest

                <!-- Always visible -->
                <div>
                    <a href="{{ route('contact') }}" class="btn btn-light w-100">
                        Contact Us
                    </a>
                </div>

            </div>
        </div>

        <!-- Contact Info -->
        <div class="contact-info mb-4">
            <h5 class="mb-3">Contact Info</h5>
            <ul class="list-unstyled small">
                <li class="mb-2">
                    📍 {{ $email ?? 'Kupandol-10, Lalitpur, Nepal' }}
                </li>
                <li class="mb-2">
                    📞
                    <a href="tel:+977{{ $contact ?? '01682648101' }}">
                        +977 {{ $contact ?? '01682648101' }}
                    </a>
                </li>
                <li>
                    ✉️
                    <a href="mailto:info@example.com">info@example.com</a>
                </li>
            </ul>
        </div>

        <!-- Social Links -->
        <div class="social-links text-center">
            <ul class="list-inline mb-0">
                <li class="list-inline-item mx-2">
                    <a href="{{ route('index') }}"><i class="fab fa-twitter"></i></a>
                </li>
                <li class="list-inline-item mx-2">
                    <a href="{{ route('index') }}"><i class="fab fa-facebook-square"></i></a>
                </li>
                <li class="list-inline-item mx-2">
                    <a href="{{ route('index') }}"><i class="fab fa-instagram"></i></a>
                </li>
                <li class="list-inline-item mx-2">
                    <a href="{{ route('index') }}"><i class="fab fa-youtube"></i></a>
                </li>
            </ul>
        </div>

    </nav>
</div>