<div class="modal fade" id="JobFormModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="jobModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content shadow-lg rounded-4 border-0">
            <form id="jobForm" class="form" method="POST" enctype="multipart/form-data"
                data-id="{{ $job->id ?? '' }}">
                @csrf
                @csrf
                <div class="modal-header bg-primary text-white rounded-top-4">
                    <h5 class="modal-title" id="jobModalTitle">Add Job</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body p-4">
                    <p id="validationErrors" class="alert alert-danger d-none"></p>

                    <div class="row g-4">
                        {{-- Custom Company --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Custom Company Name</label>
                            <input type="text" name="custom_company_name" id="custom_company_name"
                                class="form-control rounded-3 shadow-sm" placeholder="Enter company name">
                        </div>

                        {{-- Job Code --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Job Code <span class="text-danger">*</span></label>
                            <input type="text" name="job_code" id="job_code"
                                class="form-control rounded-3 shadow-sm" placeholder="Enter job code" required>
                        </div>

                        {{-- Job Title --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Job Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" id="title" class="form-control rounded-3 shadow-sm"
                                placeholder="Enter job title" required>
                        </div>

                        {{-- Salary --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Salary</label>
                            <input type="text" name="salary" id="salary" class="form-control rounded-3 shadow-sm"
                                placeholder="Enter salary">
                        </div>

                        {{-- Country --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Country</label>
                            <select name="our_country_id" id="our_country_id" class="form-select rounded-3 shadow-sm"
                                required>
                                <option value="" selected>-- Select Country --</option>
                                @foreach (\App\Models\OurCountry::all() as $country)
                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Categories --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Categories</label>
                            <select name="category_ids[]" id="category_ids" class="form-select rounded-3 shadow-sm"
                                multiple>
                                @foreach (\App\Models\JobCategory::all() as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Openings Mode --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Openings Input Mode</label>
                            <select id="openingsMode" class="form-select rounded-3 shadow-sm">
                                <option value="total" selected>Total Openings</option>
                                <option value="male-female">Male & Female Openings</option>
                            </select>
                        </div>

                        {{-- Total Openings --}}
                        <div class="col-md-12" id="totalOpeningsWrapper">
                            <label class="form-label fw-semibold">Total Openings</label>
                            <input type="number" name="total_openings" id="total_openings"
                                class="form-control rounded-3 shadow-sm" value="0" min="0">
                        </div>

                        {{-- Male & Female Openings --}}
                        <div class="col-md-12 d-none" id="maleFemaleWrapper">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Male Openings</label>
                                    <input type="number" name="male_opening" id="male_opening"
                                        class="form-control rounded-3 shadow-sm" value="0" min="0">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold">Female Openings</label>
                                    <input type="number" name="female_opening" id="female_opening"
                                        class="form-control rounded-3 shadow-sm" value="0" min="0">
                                </div>
                            </div>
                        </div>

                        {{-- Interview Date --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Interview Date</label>
                            <input type="date" name="interview_date" id="interview_date"
                                class="form-control rounded-3 shadow-sm">
                        </div>

                        {{-- Status --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Status</label>
                            <select name="status" id="status" class="form-select rounded-3 shadow-sm">
                                <option value="active" selected>Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        {{-- Description --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Description</label>
                            <textarea name="description" id="description" class="form-control summernote rounded-3 shadow-sm" rows="4"></textarea>
                        </div>

                        {{-- Requirements --}}
                        <div class="col-md-12">
                            <label class="form-label fw-semibold">Requirements</label>
                            <textarea name="requirements" id="requirements" class="form-control rounded-3 shadow-sm" rows="4"></textarea>
                        </div>

                        {{-- Link & Icon --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Link</label>
                            <input type="url" name="link" id="link"
                                class="form-control rounded-3 shadow-sm" placeholder="Enter link">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Icon Class</label>
                            <input type="text" name="icon_class" id="icon_class"
                                class="form-control rounded-3 shadow-sm" placeholder="Enter icon class">
                        </div>

                        {{-- Image & PDF --}}
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Image</label>
                            <div id="previewImage"> </div>
                            <input type="file" name="image" id="image" class="form-control rounded-3">

                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">PDF</label>
                            <input type="file" name="pdf" id="pdf" class="form-control rounded-3">
                        </div>

                    </div>
                </div>

                <input type="hidden" name="openings_mode" id="openings_mode" value="total">

                <div class="modal-footer border-0 d-flex justify-content-between px-4 py-3">
                    <button type="button" class="btn btn-outline-secondary rounded-3"
                        data-bs-dismiss="modal">Close</button>
                    <div>
                        <button type="submit" class="btn btn-success rounded-3 submitBtn">Submit</button>
                        <button type="submit" class="btn btn-warning rounded-3 updateBtn">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openingsMode = document.getElementById('openingsMode');
            const totalWrapper = document.getElementById('totalOpeningsWrapper');
            const maleFemaleWrapper = document.getElementById('maleFemaleWrapper');
            const hiddenOpeningsMode = document.getElementById('openings_mode');

            openingsMode.addEventListener('change', function() {
                hiddenOpeningsMode.value = this.value;
                if (this.value === 'male-female') {
                    totalWrapper.classList.add('d-none');
                    maleFemaleWrapper.classList.remove('d-none');
                } else {
                    totalWrapper.classList.remove('d-none');
                    maleFemaleWrapper.classList.add('d-none');
                }
            });



            const jobForm = document.getElementById('jobForm');

            jobForm.addEventListener('submit', function(e) {
                e.preventDefault();

                const formData = new FormData(this);
                const jobId = this.dataset.id; // job ID from data attribute

                fetch(`/jobs/${jobId}/apply`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Application Submitted!',
                                text: data.message,
                                confirmButtonColor: '#3085d6'
                            });
                            jobForm.reset(); // clear form
                            const modal = bootstrap.Modal.getInstance(document.getElementById(
                                'JobFormModal'));
                            modal.hide();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops!',
                                text: data.message || 'Something went wrong',
                                confirmButtonColor: '#d33'
                            });
                        }
                    })
                    .catch(error => {
                        console.error(error);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Server error. Try again later.',
                            confirmButtonColor: '#d33'
                        });
                    });
            });
        });
    </script>
@endpush
