@extends('Admin.layout.master')
@section('content')
<style>
    /* Match Select2 with Bootstrap's form-select */
    .select2-container .select2-selection--multiple {
        border: 1px solid #ced4da;
        border-radius: 0.375rem;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        height: auto;
        background-color: #fff;
    }

    .select2-container .select2-selection--multiple .select2-selection__choice {
        background-color: #0d6efd;
        border: none;
        color: white;
        padding: 0.25rem 0.75rem;
        border-radius: 0.375rem;
        margin-right: 0.25rem;
    }

    .select2-container .select2-selection--multiple .select2-selection__choice__remove {
        color: white;
        margin-right: 0.25rem;
        cursor: pointer;
    }

    .select2-container--default .select2-selection--multiple .select2-selection__choice:hover {
        background-color: #0056b3;
    }

    .select2-container--default .select2-results>.select2-results__options {
        max-height: 300px;
        /* Optional: Limit dropdown height */
        overflow-y: auto;
    }
</style>

<div class="container-fluid">
    @include('components.admin-bread-crumb-no-button', ['breadCrumbTitle' => 'Settings'])
    {{-- NOTE --}}
    <div class="mb-3">
        <small class="text-muted">
            <span class="text-danger">*</span> Required fields
        </small>
    </div>

    {{-- 🔥 BASIC INFO --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">Basic Information</div>
        <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label">Title <span class="text-danger">*</span></label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                            value="{{ $setting->title ?? '' }}">
                        @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
                        @error('logo') <small class="text-danger">{{ $message }}</small> @enderror

                        @if ($setting->logo)
                        <img src="{{ $setting->logo }}" class="mt-2 rounded" width="80">
                        @endif
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Contact <span class="text-danger">*</span></label>
                        <input type="number" name="contact" class="form-control @error('contact') is-invalid @enderror"
                            value="{{ $setting->contact ?? '' }}">
                        @error('contact') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            value="{{ $setting->email ?? '' }}">
                        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror"
                            value="{{ $setting->address ?? '' }}">
                        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>
        </div>
    </div>

    {{-- 🔥 CONTENT SECTION --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">Content Section</div>
        <div class="card-body">

            <div class="row g-3">

                <div class="col-12">
                    <label class="form-label">Welcome Description</label>
                    <textarea class="form-control description"
                        name="description">{!! $setting->description ?? '' !!}</textarea>
                </div>

                <div class="col-md-6">
                    <label class="form-label">Welcome Image</label>
                    <input type="file" name="welcome_image"
                        class="form-control @error('welcome_image') is-invalid @enderror">

                    @if ($setting->welcome_image)
                    <img src="/storage/{{ $setting->welcome_image }}" class="mt-2 rounded" width="100">
                    @endif
                </div>

                <div class="col-md-6">
                    <label class="form-label">About Image</label>
                    <input type="file" name="about_image"
                        class="form-control @error('about_image') is-invalid @enderror">

                    @if ($setting->about_image)
                    <img src="/storage/{{ $setting->about_image }}" class="mt-2 rounded" width="100">
                    @endif
                </div>

                <div class="col-12">
                    <label class="form-label">About Description</label>
                    <textarea class="form-control description"
                        name="work_description">{!! $setting->work_description ?? '' !!}</textarea>
                </div>

            </div>
        </div>
    </div>

    {{-- 🔥 SOCIAL LINKS --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header fw-bold">Social Links</div>
        <div class="card-body">

            <div class="row g-3">

                <div class="col-md-3">
                    <label class="form-label">Facebook</label>
                    <input type="url" name="facebook_url" class="form-control"
                        value="{{ $setting->facebook_url ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">GitHub</label>
                    <input type="url" name="github_url" class="form-control" value="{{ $setting->github_url ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Twitter</label>
                    <input type="url" name="twitter_url" class="form-control" value="{{ $setting->twitter_url ?? '' }}">
                </div>

                <div class="col-md-3">
                    <label class="form-label">Instagram</label>
                    <input type="url" name="instagram_url" class="form-control"
                        value="{{ $setting->instagram_url ?? '' }}">
                </div>

            </div>

            <button class="btn btn-success mt-4">Save Settings</button>

        </div>
    </div>
    </form>

    {{-- 🔥 WORKING HOURS --}}
    <div class="card shadow-sm">
        <div class="card-header fw-bold">Working Hours</div>
        <div class="card-body">

            <form id="addWorkingForm">
                @csrf

                <div class="row g-3 align-items-end">

                    <div class="col-md-4">
                        <label class="form-label">Days</label>
                        <select multiple class="form-select multiple-days-select" name="days[]">
                            <option>Sunday</option>
                            <option>Monday</option>
                            <option>Tuesday</option>
                            <option>Wednesday</option>
                            <option>Thursday</option>
                            <option>Friday</option>
                            <option>Saturday</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">Start Time</label>
                        <input type="time" name="starting_time" class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label class="form-label">End Time</label>
                        <input type="time" name="ending_time" class="form-control">
                    </div>

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            Add
                        </button>
                    </div>

                </div>
            </form>

            <div class="table-responsive mt-4">
                <table class="table table-bordered table-striped" id="fetch-working-details">
                    <thead class="table-light">
                        <tr>
                            <th>Days</th>
                            <th>Start</th>
                            <th>End</th>
                            <th width="120">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>

        </div>
    </div>

</div>
@endsection