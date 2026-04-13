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



            <h2 class="title-animation">SIGN UP</h2>

            <p class="title-animation">
                Provide your details and CV so we can match you with suitable opportunities.
            </p>
            <h4>or</h4>
            <span class="sub-title mt-2 title-animation">
                <a style="color:var(--theme-color)" href="{{ route('front.login') }}" class="fw-bold">
                    Login
                </a>
            </span>


        </div>
        <x-session-message />
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
                                <input type="text" name="full_name" placeholder="Full Name"
                                    value="{{ old('full_name') }}" class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                                    class="form-control" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">

                                <input type="tel" name="phone" placeholder="Phone (10 digits)"
                                    value="{{ old('phone') }}" class="form-control" required pattern="[0-9]{10}"
                                    maxlength="10" inputmode="numeric"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 10)"
                                    title="Phone number must be exactly 10 digits">
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
                            <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                <select class="custom-nice-select" name="education" class="form-control" required>
                                    <option value="">Select Education</option>
                                    <option value="secondary" {{ old('education')=='secondary' ? 'selected' : '' }}>
                                        Secondary School
                                    </option>
                                    <option value="High School" {{ old('education')=='High School' ? 'selected' : '' }}>
                                        High School
                                    </option>

                                    <option value="Diploma" {{ old('education')=='Diploma' ? 'selected' : '' }}>
                                        Diploma
                                    </option>

                                    <option value="Bachelor" {{ old('education')=='Bachelor' ? 'selected' : '' }}>
                                        Bachelor
                                    </option>

                                    <option value="Master" {{ old('education')=='Master' ? 'selected' : '' }}>
                                        Master
                                    </option>

                                    <option value="PhD" {{ old('education')=='PhD' ? 'selected' : '' }}>
                                        PhD
                                    </option>
                                    <option value="primary" {{ old('education')=='primary' ? 'selected' : '' }}>
                                        Primary Education
                                    </option>
                                    <option value="no_education" {{ old('education')=='no_education' ? 'selected' : ''
                                        }}>
                                        No Education
                                    </option>

                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="skills" placeholder="Skills:IT, Doctor, Carpenter, Engineer"
                                    value="{{ old('skills') }}" class="form-control" required>
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 form-group">
                                <!-- <label for="experience" class="pl-2 mb-2">Experience</label> -->
                                <input min="1" type="number" name="experience" placeholder="Experience (Years)"
                                    value="{{ old('experience') }}" class="form-control" required>
                            </div>
                            <!-- Additional Information -->
                            <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                                <!-- <div class="form-inner"> -->
                                <textarea name="bio" placeholder="Additional Information.." rows="3"
                                    class="form-control">{{ old('bio') }}</textarea>

                                <!-- </div> -->
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <!-- Upload CV (Main Emphasis) -->
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">

                            <div
                                class="upload-box d-flex align-items-center border rounded p-3 bg-theme-secondary text-white">
                                <i class="fas fa-upload fa-2x me-3"></i>
                                <input type="file" id="resume_file" name="resume_file" accept=".pdf,.doc,.docx" required
                                    class="form-control-file flex-grow-1">
                                <span class="text-light ms-3">Upload CV</span>
                            </div>
                            <small class="form-text text-light">Accepted formats: PDF, Word (.doc, .docx)</small>

                        </div>


                    </div>
                </div>
                <!-- Additional Information -->
                <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <!-- <textarea name="bio" placeholder="Additional Information.." rows="4"
                            class="form-control">{{ old('bio') }}</textarea> -->
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

@push('styles')
<style>
    input[type="phone" i],
    input[type="password" i],
    input[type="tel" i],
    .job-form-section .form-inner .form-group input[type='text'],
    .job-form-section .form-inner .form-group input[type='email'],
    .job-form-section .form-inner .form-group textarea,
    .job-form-section .form-inner .form-group .nice-select {
        position: relative;
        display: block;
        width: 100%;
        height: 60px;
        border: 1px solid #e5e5e5;
        border-radius: 40px;
        padding: 10px 25px;
        font-size: 16px;
        color: var(--text-color);
        transition: all 500ms ease;
    }

    .custom-nice-select {

        /* width: 35% !important; */
        padding: 0px 25px !important;

    }
</style>
@endpush