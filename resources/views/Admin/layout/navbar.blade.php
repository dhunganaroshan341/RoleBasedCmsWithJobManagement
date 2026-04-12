<ul class="nav">

    {{-- === CORE SETTINGS === --}}
    <li class="nav-item nav-category">Core</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="mdi mdi-view-dashboard menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.user') }}">
            <i class="mdi mdi-account-multiple menu-icon"></i>
            <span class="menu-title">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.setting.index') }}">
            <i class="mdi mdi-cog-outline menu-icon"></i>
            <span class="menu-title">Settings</span>
        </a>
    </li>

    {{-- === OPERATIONS === --}}
    <li class="nav-item nav-category">Operations</li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#jobMenu" role="button" aria-expanded="false"
            aria-controls="jobMenu">
            <i class="mdi mdi-map-marker-path menu-icon"></i>
            <span class="menu-title">Vacancies & Jobs</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="jobMenu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.job-categories.index') }}"><i
                            class="mdi mdi-briefcase-outline"></i>
                        Categories</a></li>

                <li class="nav-item"><a class="nav-link" href="{{ route('admin.vacancies.index') }}"><i
                            class="mdi mdi-briefcase-outline"></i> Manage Vacancies</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.jobs.index') }}"><i
                            class="mdi mdi-briefcase-outline"></i>
                        Job List</a></li>

                <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-calendar-check"></i>
                        Job Seekers</a></li>
                <li class="nav-item"><a class="nav-link" href="#"><i class="mdi mdi-calendar-check"></i>
                        Applications</a></li>
            </ul>
        </div>
    </li>

    {{-- === CONTENT MANAGEMENT === --}}
    <li class="nav-item nav-category">Content Management</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.pages.index') }}">
            <i class="mdi mdi-file-document-outline menu-icon"></i>
            <span class="menu-title">Pages & Sections</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#sectionMenu" role="button" aria-expanded="false"
            aria-controls="sectionMenu">
            <i class="mdi mdi-view-list menu-icon"></i>
            <span class="menu-title">Advance Sections</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="sectionMenu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.section-category.index') }}"><i
                            class="mdi mdi-shape-outline"></i> Section Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.section-content.index') }}"><i
                            class="mdi mdi-format-list-bulleted"></i> Section Content</a></li>
            </ul>
        </div>
    </li>

    {{-- === BANNERS === --}}
    <li class="nav-item nav-category">Banners</li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#bannerMenu" role="button" aria-expanded="false"
            aria-controls="bannerMenu">
            <i class="mdi mdi-image-multiple menu-icon"></i>
            <span class="menu-title">Banners</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="bannerMenu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.banner.video.index') }}"><i
                            class="mdi mdi-video"></i> Video Banner</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.page-banner.index') }}"><i
                            class="mdi mdi-image"></i> Page Banner</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.call-to-action.index') }}"><i
                            class="mdi mdi-bullhorn-outline"></i> CTA Banner</a></li>
            </ul>
        </div>
    </li>

    {{-- === SERVICES & TESTIMONIALS === --}}
    <li class="nav-item nav-category">Services & Social Proof</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.service.index') }}">
            <i class="mdi mdi-face-agent menu-icon"></i>
            <span class="menu-title">Services</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.testimonial') }}">
            <i class="mdi mdi-comment-account menu-icon"></i>
            <span class="menu-title">Testimonials</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.achievements.index') }}">
            <i class="mdi mdi-trophy-outline menu-icon"></i>
            <span class="menu-title">Achievements</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.client.index') }}">
            <i class="mdi mdi-account-group-outline menu-icon"></i>
            <span class="menu-title">Clients</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.gallery-albums.index') }}">
            <i class="mdi mdi-view-gallery menu-icon"></i>
            <span class="menu-title">Gallery</span>
        </a>
    </li>

    {{-- === MEDIA & MARKETING === --}}
    <li class="nav-item nav-category">Media & Marketing</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.notice.index') }}">
            <i class="mdi mdi-bullhorn menu-icon"></i>
            <span class="menu-title">Notices</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="collapse" href="#blogMenu" role="button" aria-expanded="false"
            aria-controls="blogMenu">
            <i class="mdi mdi-post-outline menu-icon"></i>
            <span class="menu-title">Blogs</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="blogMenu">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.category') }}"><i
                            class="mdi mdi-tag-outline"></i> Blog Categories</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('admin.post') }}"><i
                            class="mdi mdi-note-text-outline"></i> Blog Posts</a></li>
            </ul>
        </div>
    </li>

    {{-- === UTILITIES === --}}
    <li class="nav-item nav-category">Utilities</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.contact.index') }}">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Contact</span>
        </a> <a class="nav-link" href="{{ route('admin.hire-workers.index') }}">
            <i class="mdi mdi-contacts menu-icon"></i>
            <span class="menu-title">Hire Requests</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.newsletters.index') }}">
            <i class="mdi mdi-email-newsletter menu-icon"></i>
            <span class="menu-title">Newsletters</span>
        </a>
    </li>

    {{-- === LOGOUT === --}}
    <li class="nav-item mt-3">
        <a class="nav-link" href="{{ route('admin.logout') }}">
            <i class="mdi mdi-logout menu-icon text-danger"></i>
            <span class="menu-title text-danger">Logout</span>
        </a>
    </li>
</ul>