@extends('frontend.layouts.layout')

@php
$title = 'Request Talent';
$subTitle = 'Hire';
$css =
'
<link href="' .
        asset('assets/css/module-css/header.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/page-title.css') .
        '" rel="stylesheet">
<link href="' .
        asset('assets/css/module-css/job.css') .
        '" rel="stylesheet">
';
@endphp

@section('content')
<!-- job-form-section -->
<x-session-success-table-message />
<section class="job-form-section pt_120 pb_120">
    <div class="auto-container">
        <div class="sec-title centred pb_70 light sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">REQUEST NEEDED TALENT</span>
            <h2 class="title-animation">Hire Talented Professionals</h2>
            <p class="title-animation">Fill out the form below and let us help you find the right candidates for your
                company.</p>
        </div>

        <form id="hireForm" method="post" action="{{ route('hire.store') }}">
            @csrf
            <div class="row clearfix">

                <!-- Contact Person Details -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-box">
                            <div class="icon-box"><i class="icon-39"></i></div>
                            <h3>Contact Person</h3>
                            <p> Contact details of the person responsible for this request.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lname" placeholder="Last Name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="phone" placeholder="Phone" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Details -->
                <div class="col-lg-6 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-box">
                            <div class="icon-box"><i class="icon-40"></i></div>
                            <h3>Company Details</h3>
                            <p>Provide your company information for reference.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="company_name" placeholder="Company Name" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="web_url" placeholder="Website (Optional)">
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="industry" placeholder="Industry" required>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="location" placeholder="Company Location" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Job / Talent Request -->
                <div class="col-lg-12 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-box">
                            <div class="icon-box"><i class="icon-41"></i></div>
                            <h3>Request Talent</h3>
                            <p>Provide details about the positions you are hiring for.</p>
                        </div>
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="position" placeholder="Position / Role" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="openings"
                                    placeholder="Number of People (e.g. 10 Male, 20 Female)" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input type="text" name="salary_range" placeholder="Pay / Salary Range" required>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="job_description" placeholder="Job Description" required></textarea>
                            </div>
                        </div>
                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn btn-one">Submit Your Request</button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const hireForm = document.getElementById('hireForm');

    hireForm.addEventListener('submit', function (e) {
        e.preventDefault(); // Prevent normal form submission

        let formData = new FormData(hireForm);

        fetch(hireForm.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                    'content')
            },
            body: formData
        })
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success!',
                        text: data.message
                    });
                    hireForm.reset(); // Optional: reset the form
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: data.message || 'Something went wrong!'
                    });
                }
            })
            .catch(err => {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Something went wrong!'
                });
                console.error(err);
            });
    });
</script>
@endpush