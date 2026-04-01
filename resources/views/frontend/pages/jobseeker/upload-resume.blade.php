@extends('frontend.layouts.layout')

@php
$title = 'Upload CV';
$subTitle = 'Submit Your Profile';
$css =
'
<link href="' .
        asset('assets/css/module-css/page-title.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/job.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/subscribe.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/footer.css') .
        '" rel="stylesheet">';
@endphp

@section('content')
<!-- Upload CV Form Section -->
<section class="job-form-section dark-section pt_110 pb_90">
    <div class="auto-container">
        <!-- Section Title -->
        <div class="sec-title centred pb_70 sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">SHARE YOUR DETAILS</span>
            <h2 class="title-animation">Login & Upload Your CV</h2>
            <p class="title-animation">Provide your details and CV so we can match you with suitable opportunities.</p>
        </div>

        <form method="post" action="{{ route('jobseeker.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row g-4">



                <!-- Basic Information -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h3>Basic Information</h3>
                        <p class="text-muted">Enter your personal details below.</p>
                        <div class="row g-3">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="full_name" placeholder="Full Name" value="{{ old('name') }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="address" placeholder="Address" value="{{ old('address') }}"
                                    class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password" placeholder="password"
                                    value="{{ old('password') }}" class="form-control">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="password" name="password_confirmation" placeholder="confirm password"
                                    value="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Education & Skills -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <h3>Education & Skills</h3>
                        <p class="text-muted">Provide your education, experience, and skills.</p>
                        <div class="row g-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="education" placeholder="Education"
                                    value="{{ old('education') }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="skills" placeholder="Skills:IT, Doctor, Carpenter, Engineer"
                                    value="{{ old('skills') }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="experience" placeholder="Experience: 2 years"
                                    value="{{ old('experience') }}" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Upload CV (Main Emphasis) -->
                <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                    <label for="resume_file" class="form-label fw-bold">Upload Your CV</label>
                    <div class="upload-box d-flex align-items-center border rounded p-3 bg-theme-secondary text-white">
                        <i class="fas fa-upload fa-2x me-3"></i>
                        <input type="file" id="resume_file" name="resume_file" accept=".pdf,.doc,.docx" required
                            class="form-control-file flex-grow-1">
                        <span class="btn btn-light ms-3">Choose File</span>
                    </div>
                    <small class="form-text text-light">Accepted formats: PDF, Word (.doc, .docx)</small>
                </div>
                <!-- Additional Information -->
                <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <textarea name="bio" placeholder="Additional Information.." rows="4"
                            class="form-control">{{ old('bio') }}</textarea>
                        <div class="form-group message-btn centred mt-3">
                            <button type="submit" class="theme-btn btn-one w-100">Submit CV</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
<!-- Upload CV Form Section End -->
@endsection