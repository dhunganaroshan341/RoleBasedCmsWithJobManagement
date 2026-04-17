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
<section class="job-form-section pt_120 pb_120">
    <div class="auto-container">
        <div class="sec-title centred pb_70 light sec-title-animation animation-style2">
            <span class="sub-title mb_10 title-animation">REQUEST NEEDED TALENT</span>
            <h2 class="title-animation">Hire Talented Professionals</h2>
            <p class="title-animation">Fill out the form below and let us help you find the right candidates for your
                company.</p>
        </div>
        <div class="card p-2 mb-2">
            <x-session-message />
        </div>
        <form id="hireForm" method="POST" action="{{ route('hire.submit') }}">
            @csrf
            <div class="row clearfix">

                <!-- Contact Person Details -->
                <div class="col-lg-7 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-box">
                            <div class="icon-box"><i class="icon-39"></i></div>
                            <h3>Contact Person</h3>
                            <p>Contact details of the person responsible for this request.</p>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="fname" placeholder="First Name" required pattern="[A-Za-z\s]+">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="lname" placeholder="Last Name" required pattern="[A-Za-z\s]+">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="email" name="email" placeholder="Email" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <div style="display:flex; gap:5px;">
                                    <select class="custom-nice-select" name="country_code" required>
                                        <option value="+977">+977</option>
                                        <option value="+91">+91</option>
                                        <option value="+44">+44</option>
                                        <option value="+1">+1</option>
                                    </select>

                                    <input type="tel" name="phone" placeholder="9812345678" required
                                        pattern="^[0-9]{7,12}$" inputmode="numeric"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Company Details -->
                <div class="col-lg-5 col-md-12 col-sm-12 form-column">
                    <div class="form-inner">
                        <div class="title-box">
                            <div class="icon-box"><i class="icon-40"></i></div>
                            <h3>Company Details</h3>
                            <p> company information for reference.</p>
                        </div>

                        <div class="row clearfix">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="company_name" placeholder="Company Name" required>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="url" name="web_url" placeholder="https://example.com">
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <input type="text" name="industry" placeholder="Industry" required
                                    pattern="[A-Za-z\s]+">
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
                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <input type="text" name="position" placeholder="Position / Role" required>
                            </div>

                            <div class="col-lg-3 col-md-6 col-sm-12 form-group">
                                <input type="number" name="openings" placeholder="Number of Openings" min="1" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <div style="display:flex; gap:5px;">

                                    <select class="custom-nice-select" name="currency" required>
                                        <option value="NPR">🇳🇵 NPR (Nepalese Rupee)</option>
                                        <option value="USD">🇺🇸 USD (US Dollar)</option>
                                        <option value="EUR">🇪🇺 EUR (Euro)</option>
                                        <option value="GBP">🇬🇧 GBP (British Pound)</option>
                                        <option value="AUD">🇦🇺 AUD (Australian Dollar)</option>
                                        <option value="CAD">🇨🇦 CAD (Canadian Dollar)</option>
                                        <option value="JPY">🇯🇵 JPY (Japanese Yen)</option>
                                        <option value="CNY">🇨🇳 CNY (Chinese Yuan)</option>
                                        <option value="KRW">🇰🇷 KRW (South Korean Won)</option>
                                        <option value="SGD">🇸🇬 SGD (Singapore Dollar)</option>
                                        <option value="MYR">🇲🇾 MYR (Malaysian Ringgit)</option>
                                        <option value="AED">🇦🇪 AED (UAE Dirham)</option>
                                        <option value="QAR">🇶🇦 QAR (Qatari Riyal)</option>
                                        <option value="SAR">🇸🇦 SAR (Saudi Riyal)</option>
                                        <option value="KWD">🇰🇼 KWD (Kuwaiti Dinar)</option>
                                    </select>

                                    <!-- <input type="number" name="amount" placeholder="Amount" required min="0"> -->

                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input min=0 type="number" name="salary_range" placeholder="From 20,000" required>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12 form-group">
                                <input min=0 type="number" name="salary_range_to" placeholder="To 50,000" required>
                            </div>

                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="job_description" placeholder="Job Description" required minlength="20"
                                    style="min-height: 2em;"></textarea>
                            </div>
                        </div>

                        <div class="form-group message-btn">
                            <button type="submit" class="theme-btn btn-one">
                                Submit Your Request
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
</section>
@endsection

@push('styles')
<style>
    input[type="phone" i],
    input[type="password" i],
    input[type="url" i],
    input[type="number" i],
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const form = document.getElementById('hireForm');
        const fromInput = document.querySelector('input[name="salary_range"]');
        const toInput = document.querySelector('input[name="salary_range_to"]');

        function showError(input, message) {
            input.style.border = '1px solid red';

            let error = input.nextElementSibling;
            if (!error || !error.classList.contains('error-text')) {
                error = document.createElement('small');
                error.classList.add('error-text');
                error.style.color = 'red';
                error.style.marginLeft = '10px';
                input.parentNode.appendChild(error);
            }
            error.innerText = message;
        }

        function clearError(input) {
            input.style.border = '';
            let error = input.parentNode.querySelector('.error-text');
            if (error) error.remove();
        }

        function validateSalary() {
            const from = parseFloat(fromInput.value);
            const to = parseFloat(toInput.value);

            let valid = true;

            // FROM validation
            if (isNaN(from) || from < 0) {
                showError(fromInput, 'Enter a valid starting salary');
                valid = false;
            } else {
                clearError(fromInput);
            }

            // TO validation
            if (isNaN(to) || to < 0) {
                showError(toInput, 'Enter a valid maximum salary');
                valid = false;
            } else if (to < from) {
                showError(toInput, 'Max salary must be greater than or equal to min salary');
                valid = false;
            } else {
                clearError(toInput);
            }

            return valid;
        }

        // Real-time validation
        fromInput.addEventListener('input', validateSalary);
        toInput.addEventListener('input', validateSalary);

        // On submit
        form.addEventListener('submit', function (e) {
            if (!validateSalary()) {
                e.preventDefault();
            }
        });

    });
</script>
@endpush